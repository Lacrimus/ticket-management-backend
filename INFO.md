## Implicit binding of models
In most of the routes, the entire model object is passed into the function, as the `$id` is resolved automatically by Laravel.
Therefore `public function show(Ticket $ticket) { return $ticket}` matches `public function show($id) { return Ticket::find($id)}`.
Due to this, the methods in `api.php` also use `tickets/{ticket}` instead of `tickets/{id}`.