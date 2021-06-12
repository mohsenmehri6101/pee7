
<div class="row" style="padding: 0;">

    <div class="col-sm-12" style="padding: 0;">


        <div class="chat_content">
            <div id="chat_content" style="padding: 2em;height: 550px;position: relative;">
                @foreach($tickets as $ticket)

                    @if(\Illuminate\Support\Facades\Auth::user()->id == $ticket->sender_id)
                        <div class="row" style="width: 100%">
                            <div class="direct-chat-msg right" style="width: 100%">
                                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name float-right">
                        {{ \App\User::find($ticket->sender_id)->name }}
                    </span>
                                    <span class="direct-chat-timestamp float-left text-sm" style="margin-right: 15px;">
                        {{ verta($ticket->created_at)->formatDifference() }}
                    </span>
                                </div>
                                <img class="direct-chat-img" src="{{ auth()->user()->image ? url('images/'.auth()->user ()->image)  : url('images/default/user-avator.jpg') }}" alt="message user image">
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
                        {{ \App\User::find($ticket->sender_id)->name }}
                    </span>
                                    <span class="direct-chat-timestamp float-right">
                        {{ verta($ticket->created_at)->formatDifference() }}
                    </span>
                                </div>
                                <!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="{{ url('images/img/user-avator.jpg') }}" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    <p>
                                        {{ $ticket->message }}
                                    </p>
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                        </div>
                    @endif

                @endforeach
            </div>

            <div class="input-group"  style="width: 100%">
                <input id="description" name="description" type="text" class="form-control" style="border-radius: 0 0 0.25rem 0">
                <span class="input-group-append">
                    <button id="message_btn" onclick="send_message()" type="button" class="btn btn-info btn-flat" style="border-radius: 0 0 0 0.25rem">ارسال</button>
                  </span>
            </div>
        </div>
        
    </div>
</div>

