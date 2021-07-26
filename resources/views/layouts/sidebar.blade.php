<!-- Sidebar-right-->
		<div class="sidebar sidebar-left sidebar-animate">
			<div class="panel panel-primary card mb-0 box-shadow">
				<div class="tab-menu-heading border-0 p-3">
					<div class="card-title mb-0">الاشعارات</div>
					<div class="card-options mr-auto">
						<a href="#" class="sidebar-remove"><i class="fe fe-x"></i></a>
					</div>
				</div>
				<div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
					<div class="tabs-menu ">
						<!-- Tabs -->
						<ul class="nav panel-tabs">

							<li><a href="#side2" class="active" data-toggle="tab"><i class="ion ion-md-notifications tx-18  ml-2"></i> الاشعارات</a></li>
							<li><a href="#side3" data-toggle="tab"><i class="ion ion-md-contacts tx-18 ml-2"></i> المستخدمين الفعالين</a></li>
						</ul>
					</div>
					<div class="tab-content">

						<div class="tab-pane active " id="side2">
							<div class="list-group list-group-flush ">

                                <div id="unreadNotifications">
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                        <div class="main-notification-list Notification-scroll">
                                            <a class="d-flex p-3 border-bottom"
                                               href="{{ url('InvoicesDetails') }}/{{ $notification->data['id'] }}">
                                                <div class="notifyimg bg-pink">
                                                    <i class="la la-file-alt text-white"></i>
                                                </div>


                                                <div class="mr-3">
                                                    <h5 class="notification-label mb-1">{{ $notification->data['title'] }}
                                                        {{ $notification->data['user'] }}
                                                    </h5>
                                                    <div class="notification-subtext">{{ $notification->created_at }}</div>
                                                </div>



                                            </a>
                                        </div>
                                    @endforeach

                                </div>
							</div>
						</div>
						<div class="tab-pane  " id="side3">
							<div class="list-group list-group-flush ">
                                @php $users = App\User::where('Status' , '=' , 'مفعل')->get() @endphp
                                @foreach($users as $user)
								<div class="list-group-item d-flex  align-items-center">
									<div class="ml-2">
										<span class="avatar avatar-md brround cover-image" data-image-src="{{URL::asset('assets/img/faces/face.png')}}"><span class="avatar-status bg-success"></span></span>
									</div>
									<div class="">
										<div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">{{$user->name}}</div>
									</div>
								</div>
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--/Sidebar-right-->
