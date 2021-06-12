<div class="row" id="chat_content" style="position: relative;">
    @foreach($tickets as $ticket)
        <?php $sender = \App\User::find($ticket->sender_id) ?>
        @if(\Illuminate\Support\Facades\Auth::user()->id == $ticket->sender_id)
            <div class="row" style="width: 100%">
                <div class="direct-chat-msg right" style="width: 100%">
                    <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name float-right">
                        {{ $sender->name }}
                    </span>
                        <span class="direct-chat-timestamp float-left text-sm" style="margin-right: 15px;">
                        {{ verta($ticket->created_at)->formatDifference() }}
                    </span>
                    </div>
                    <img class="direct-chat-img" src="{{ url('images/'.$sender->image) }}" alt="message user image">
                    <div class="direct-chat-text" style="background: #007bff;border-color: #007bff;color: #fff;">
                        <p class="text-justify">
                            {{ $ticket->message }}
                        </p>
                    </div>
                </div>
            </div>
        @else

            <div class="row" style="width: 100%">
                <div class="direct-chat-msg" style="width: 100%">
                    <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name float-left">
                        {{ $sender->name }}
                    </span>
                        <span class="direct-chat-timestamp float-right">
                        {{ verta($ticket->created_at)->formatDifference() }}
                    </span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="{{ url('images/'.$sender->image) }}" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        <p>
                            {{ $ticket->message }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>