@if(auth()->user()->supplier)
                        <div class="row">
                            <div class="col-sm-4 border-left">
                                <div class="description-block text-left pl-4">
                                    <h5 class="description-header pb-3 text-right pr-3 text-secondary">
                                        راه های ارتباطی
                                    </h5>
                                    <p>
                                        {{ auth()->user()->contact->phones }}
                                        <i class="pr-1 fa fa-phone"></i>
                                    </p>
                                    <p>
                                        {{ auth()->user()->contact->mobiles }}
                                        <i class="pr-1 fa fa-mobile"></i>
                                    </p>
                                    <p>
                                        {{ auth()->user ()->contact->telegram }}
                                        <i class="pr-1 fa fa-telegram"></i>
                                    </p>
                                    <p>
                                        <a href="">{{ auth()->user()->email }}</a>
                                        <i class="pr-1 fa fa-get-pocket"></i>
                                    </p>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-left">
                                <div class="description-block text-right pr-3">
                                    <h5 class="description-header pb-3 text-secondary">
                                        موقعیت مکانی
                                    </h5>
                                    <p>
                                        <i class="fa fa-info pl-2"></i>
                                        <span class="text-secondary">استان :</span>
                                        {{ auth()->user()->location->province }}
                                    </p>
                                    <p>
                                        <i class="fa fa-info pl-2"></i>
                                        <span class="text-secondary">شهرستان :</span>
                                        {{ auth()->user()->location->city }}
                                    </p>
                                    <p>
                                        <i class="fa fa-info pl-2"></i>
                                        <span class="text-secondary">کد پستی ثبت شده :</span>
                                        {{ auth()->user()->location->plate }}
                                    </p>
                                    <p>
                                        <i class="fa fa-info pl-2"></i>
                                        <span class="text-secondary">آدرس :</span>
                                        {{ auth()->user()->location->address }}
                                    </p>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block text-right pr-3">
                                    <h5 class="description-header pb-3 text-secondary">
                                        اطلاعات شرکت
                                    </h5>
                                    <p>
                                        <i class="fa fa-info pl-2"></i>
                                        <span class="text-secondary">نام شرکت :</span>
                                        {{ auth()->user()->name }}
                                    </p>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <hr class="pl-5 pr-5 mr-5 ml-5">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-sm-4 border-left">
                                <div class="description-block text-center">
                                    @if(auth()->user()->image)
                                        <a target="_blank" class="text-center" href="{{url('images/'.auth()->user ()->image)}}" >
                                            <img class="img-fluid img-rounded"  src="{{url('images/'.auth()->user ()->image)}}">
                                        </a>
                                    @else
                                        <i style="font-size: 150px;color:grey"  class="fa fa-5x fa-5x fa-user"></i>
                                    @endif
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-8">
                                <div class="description-block text-left pl-4">
                                    <h5 class="description-header pb-3 text-right pr-3 text-secondary">
                                        درباره
                                    </h5>
                                    <div class="description-block text-right pr-5">
                                        <p class="text-justify">
                                            {{ auth()->user()->supplier->about }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>