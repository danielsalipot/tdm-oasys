<header id="header" name="hidden_name" style="z-index: 9999">
    <div class="d-flex flex-column">
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="/employee/home"  class="nav-link py-4" title="Home" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bx bx-home"></i></a></li>
                <li><a href="/employee/orientation" class="nav-link py-3" title="Orientation" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-journal-bookmark"></i></a></li>
                <li><a href="/employee/training" class="nav-link py-3" title="Training" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-briefcase-fill"></i></a></li>
                <li><a href="/employee/correction" class="nav-link py-3" title="Correction" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-wrench"></i></a></li>
                <li><a href="/employee/overtime" class="nav-link py-3" title="Overtime" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-clock-history"></i></a></li>
                <li><a href="/employee/leave" class="nav-link py-3" title="Leave" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-calendar2-minus"></i></a></li>
                <li><a href="/message" class="nav-link py-3" title="Messages" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-chat-left-text"></i> <span id='badge' style="font-size: 9px"></span></a></li>
                <li><a href="/employee/profile" class="nav-link py-3 pb-5 mb-5" title="Profile" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-person-fill"></i></a></li>
            </ul>
            <ul>
                <li><a href="/logout" class="nav-link pt-5 mt-5" title="Logout" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-box-arrow-left"></i></a></li>
            </ul>
        </nav><!-- .nav-menu -->
    </div>
</header>
<!-- End Header -->

<header id="header" name="show_name" class="d-none " style="z-index: 9999;width:200px">
        <nav id="navbar" class="nav-menu navbar ">
            <ul class="w-100">
                <li><a href="/employee/home"  class="nav-link py-4" title="Home" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bx bx-home pe-4"></i>Dashboard</a></li>
                <li><a href="/employee/orientation" class="nav-link py-3" title="Orientation" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-journal-bookmark pe-4"></i>Orientation</a></li>
                <li><a href="/employee/training" class="nav-link py-3" title="Training" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-briefcase-fill pe-4"></i>Training</a></li>
                <li><a href="/employee/correction" class="nav-link py-3" title="Correction" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-wrench pe-4"></i>Correction</a></li>
                <li><a href="/employee/overtime" class="nav-link py-3" title="Overtime" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-clock-history pe-4"></i>Overtime</a></li>
                <li><a href="/employee/leave" class="nav-link py-3" title="Leave" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-calendar2-minus pe-4"></i>Leave</a></li>
                <li><a href="/message" class="nav-link py-3" title="Messages" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-chat-left-text pe-4"></i>Messages <span id='extended_badge' style="font-size: 9px"></span></a></li>
                <li><a href="/employee/profile" class="nav-link py-3 pb-5 mb-5" title="Profile" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-person-fill pe-4"></i>Profile</a></li>
            </ul>
            <ul>
                <li><a href="/logout" class="nav-link pt-5 mt-5" title="Logout" data-bs-toggle="tooltip" data-bs-placement="right"><i class="bi bi-box-arrow-left pe-4"></i>Logout</a></li>
            </ul>
        </nav><!-- .nav-menu -->
</header>

<script>
    $(document).ready(function(){

        $("[name='hidden_name']").hover(
            function (){
                $("[name='hidden_name']").toggleClass('d-none')
                $("[name='show_name']").toggleClass('d-none')
            },
            function (){
                $("[name='hidden_name']").toggleClass('d-none')
                $("[name='show_name']").toggleClass('d-none')
            }
        )

        $("[name='show_name']").hover(
            function (){
                $("[name='hidden_name']").toggleClass('d-none')
                $("[name='show_name']").toggleClass('d-none')
            },
            function (){
                $("[name='hidden_name']").toggleClass('d-none')
                $("[name='show_name']").toggleClass('d-none')
            }
        )

        function load_chat(){
                $.ajax({
                url: `/fetchNavBarMessageCount`,
                type: 'get',
                success: function(response){
                    var badge = document.getElementById('badge')
                    var extended_badge = document.getElementById('extended_badge')

                    if(parseInt(response)){
                        var badgeClass = 'badge badge-pill bg-danger p-2 ms-3 rounded'
                        badge.innerHTML = response
                        extended_badge.innerHTML = response

                        badge.className = badgeClass
                        extended_badge.className = badgeClass
                    }else{
                        var badgeClass = 'd-none'
                        badge.className = badgeClass
                        extended_badge.className = badgeClass
                    }
                }
            });
        }

        load_chat()

        setInterval(function(){
            load_chat()
        }, 3000);
    });
</script>


