<body>
    <form action="" method="POST">
        @csrf

        <label for="user_id">Gebruiker</label>
        <input type="number" name="user_id" value="{!! $ticket->user_id !!}">

        <label for="ticket_type">Ticket Type</label>
        <input type="number" name="ticket_type" value="{!! $ticket->ticket_type !!}">

        <button>Dien In</button>
    </form>
</body>
