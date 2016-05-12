<!-- Son güncellemeler
                                        <ul class="list-unstyled top_profiles">
                                        
                                        @for ($i=0;$i<5;$i++)
                                            @if($i<3)
                                                <li class="media event">
                                                    <a class="pull-left border-aero profile_thumb">
                                                        <i class="fa fa-bell aero"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <p>&nbsp;</p>
                                                        <p><b>R{{$i+1}}</b> <b class="text-success"> aktif</b> duruma geçti </p>
                                                        <p> <i class="fa fa-clock-o"></i><small> {{date("Y-m-d H:i")}}</small>
                                                        </p>
                                                    </div>
                                                </li>
                                            @elseif($i>2 && $i<4)
                                                <li class="media event">
                                                    <a class="pull-left border-aero profile_thumb">
                                                        <i class="fa fa-bell aero"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <p>&nbsp;</p>
                                                        <p><b>R{{$i+1}}</b> <b class="text-danger"> pasif</b> duruma geçti </p>
                                                        <p> <i class="fa fa-clock-o"></i><small> {{date("Y-m-d H:i")}}</small>
                                                        </p>
                                                    </div>
                                                </li>
                                            @else
        <li class="media event">
            <a class="pull-left border-aero profile_thumb">
                <i class="fa fa-bell aero"></i>
            </a>
            <div class="media-body">
                <p>&nbsp;</p>
                                                        <p><b>T{{$i+1}}</b> <b class="text-warning"> tehlikeli</b> sıcaklık seviyesine ulaştı </p>
                                                        <p> <i class="fa fa-clock-o"></i><small> {{date("Y-m-d H:i")}}</small>
                                                        </p>
                                                    </div>
                                                </li>
                                            @endif
@endfor
        </ul>-->