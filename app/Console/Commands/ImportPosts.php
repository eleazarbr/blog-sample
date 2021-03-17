<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ImportPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import posts from sq1-api-test.herokuapp.com';

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $endpoint = "https://sq1-api-test.herokuapp.com/posts";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $admin = User::admin()->first();
        $data = json_decode(
            file_get_contents($this->endpoint),
            true
        );

        $posts = collect($data['data']);
        $bar = $this->output->createProgressBar($posts->count());
        $bar->start();

        foreach ($posts->chunk(500) as $postChunk) {
            foreach ($postChunk as $post) {
                $admin->posts()->create([
                    'title' => $post['title'],
                    'description' => $post['description'],
                    'published_at' => $post['publication_date']
                ]);
                $bar->advance();
            }
        }

        $bar->finish();
    }
}
