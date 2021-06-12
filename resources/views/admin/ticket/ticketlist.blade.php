@foreach($chat_list as $chat)
    <?php $user = \App\User::find($chat['key']);
    $data = array('key'=>$chat['key'],'name'=>$user->name);
    ?>
    <div class="chat_list" id="chat_id_{{$chat['key']}}" onclick="get_chat({{$chat['key']}})" >
        <div class="row" style="padding: 1em;padding-bottom: 0">
            <div class="col-sm-3">
                <div class="chat_img">
                    <img src="{{ url ('/images/'.$user->image)}}" alt="sunil" width="75%" style="border-radius: 50%">
                </div>
            </div>
            <div class="col-sm-9">
                <div class="chat_name">

                    {{ $user->name }}
                    @if($chat['count'] > 0)
                        <span class="text-sm badge badge-success">
                            {{$chat['count']}}
                        </span>
                    @endif

                    <div class="chat_setting" style="float: left">
                        <button onclick="delete_chat({{json_encode($data)}})" class="btn btn-sm btn-circle btn-outline-danger" style="border-radius: 50%;line-height: 1.428571429;font-size: 12px;padding: 6px 0;text-align: center;height: 30px;width: 30px" title="حذف">
                            <i class="fa fa-trash"></i>
                        </button>
                        @if($user->is_ban)
                            <button onclick='return unban_user("{{$data['key']}}","{{$data['name']}}")' class="btn btn-sm btn-circle btn-outline-success" style="border-radius: 50%;line-height: 1.428571429;font-size: 12px;padding: 6px 0;text-align: center;height: 30px;width: 30px" title="بلاک">
                                <i class="fa fa-unlock"></i>
                            </button>
                        @else
                            <button onclick='return ban_user("{{$data['key']}}","{{$data['name']}}")' class="btn btn-sm btn-circle btn-outline-warning" style="border-radius: 50%;line-height: 1.428571429;font-size: 12px;padding: 6px 0;text-align: center;height: 30px;width: 30px" title="بلاک">
                                <i class="fa fa-lock"></i>
                            </button>
                        @endif
                    </div>
                </div>
                <div>
                    <small class="chat_date">
                        {{ verta($chat['created_at'])->formatDifference() }}
                    </small>
                </div>
                <div class="chat_text">
                    <small>
                        <p>
                            {{$chat['last_message']}}
                        </p>
                    </small>
                </div>
            </div>
        </div>

    </div>
@endforeach
