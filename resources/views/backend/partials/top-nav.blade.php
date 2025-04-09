
    <script>
        // FOR ANSHUMAN REFERENCES ONLY
        console.log("Type:", @json(Auth::guard('admin')->user()->type));
 console.log("Admin ID:", @json(Auth::guard('admin')->user()->id));
      
    </script>

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
    id="navbarBlur" data-scroll="true" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"></a>
                </li>
                <li class="breadcrumb-item text-sm text-dark  "></li>
                <li class="breadcrumb-item text-sm text-dark active "></li>
            </ol>
        </nav>

        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
               
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






                <li class="nav-item d-flex align-items-center">
    <a href="{{ route('backend.profile') }}" class="nav-link font-weight-bold px-0 d-flex align-items-center">
        <div class="profile-icon d-flex justify-content-center align-items-center">
            <i class="material-symbols-rounded">account_circle</i>
        </div>
        <span class="admin-type ms-2">{{ Auth::guard('admin')->user()->type }}</span>
    </a>
</li>

<style>
.profile-icon {
    width: 40px;
    height: 40px;
    background-color: #f0f0f0; /* Light gray background */
    border-radius: 50%; /* Makes it circular */
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s ease;
}

.profile-icon i {
    font-size: 32px;
    color:rgb(2, 14, 26); /* Light blue icon */
}

.profile-icon:hover {
    background-color:rgb(2, 14, 26);;
}

.profile-icon:hover i {
    color: #fff;
}
</style>


            </ul>
        </div>
    </div>
</nav>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
