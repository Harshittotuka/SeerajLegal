<nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" data-scroll="true" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"></a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark  " ></li>
                          <li class="breadcrumb-item text-sm text-dark active " ></li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                    </div>
                    <ul class="navbar-nav d-flex align-items-center  justify-content-end">

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-dark"></i>
                                    <i class="sidenav-toggler-line bg-dark"></i>
                                    <i class="sidenav-toggler-line bg-dark"></i>
                                </div>
                            </a>
                        </li>


                        <li class="nav-item dropdown pe-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-symbols-rounded">notifications</i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link p-0">
                                <i class="material-symbols-rounded fixed-plugin-button-nav">settings</i>
                            </a>
                        </li>

                        <li class="nav-item d-flex align-items-center">
    <a href="{{ route('backend.contact') }}" class="nav-link font-weight-bold px-0">
        <i class="material-symbols-rounded">account_circle</i>
    </a>
</li>


                    </ul>
                </div>
            </div>
        </nav>