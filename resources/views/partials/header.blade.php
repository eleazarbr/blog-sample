<navbar :auth-user="{{ auth()->check() ? auth()->user() : '{}' }}"></navbar>
