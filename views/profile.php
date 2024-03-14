<div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="profile-bg-picture"
                                style="background-image:url('assets/images/bg-profile.jpg')">
                                <span class="picture-bg-overlay"></span>
                                <!-- overlay -->
                            </div>
                            <!-- meta -->
                            <div class="profile-user-box">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="profile-user-img"><img src="assets/images/users/avatar-1.jpg" alt=""
                                                class="avatar-lg rounded-circle"></div>
                                        <div class="">
                                            <h4 class="mt-4 fs-17 ellipsis"><?php echo isset($_SESSION['usuario']['nombre']) ? $_SESSION['usuario']['nombre'] : 'Error'; ?></h4>
                                            <p class="font-13"><?php echo isset($_SESSION['usuario']['description']) ? $_SESSION['usuario']['description'] : 'Error'; ?></p>
                                            <p class="text-muted mb-0"><small>California, United States</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex justify-content-end align-items-center gap-2">
                                            <a href="#edit-profile" onclick="changeTab('edit-profile', this)">
                                                <button type="button" class="btn btn-soft-danger">
                                                    <i class="ri-settings-2-line align-text-bottom me-1 fs-16 lh-1"></i>
                                                    Edit Profile
                                                </button>
                                            </a>
                                            <a class="btn btn-soft-info" href="#edit-profile"> 
                                                <i class="ri-check-double-fill fs-18 me-1 lh-1"></i> Following
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card p-0">
                                <div class="card-body p-0">
                                    <div class="profile-content">
                                        <ul class="nav nav-underline nav-justified gap-0">
                                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                                    data-bs-target="#aboutme" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true" href="#aboutme">About</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#user-activities" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    href="#user-activities">Activities</a></li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#edit-profile" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    href="#edit-profile">Settings</a></li>
                                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#projects" type="button" role="tab"
                                                    aria-controls="home" aria-selected="true"
                                                    href="#projects">Projects</a></li>
                                        </ul>

                                        <div class="tab-content m-0 p-4">
                                            <div class="tab-pane active" id="aboutme" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <div class="profile-desk">
                                                    <h5 class="text-uppercase fs-17 text-dark">Johnathan Deo</h5>
                                                    <div class="designation mb-4">PRODUCT DESIGNER (UX / UI / Visual
                                                        Interaction)</div>
                                                    <p class="text-muted fs-16">
                                                    <?php echo isset($_SESSION['usuario']['description']) ? $_SESSION['usuario']['description'] : ''; ?>
                                                    </p>

                                                    <h5 class="mt-4 fs-17 text-dark">Contact Information</h5>
                                                    <table class="table table-condensed mb-0 border-top">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Url</th>
                                                                <td>
                                                                    <a href="#" class="ng-binding">
                                                                    <?php echo isset($_SESSION['usuario']['website']) ? $_SESSION['usuario']['website'] : ''; ?>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Email</th>
                                                                <td>
                                                                    <a href="mailto:<?php echo isset($_SESSION['usuario']['email']) ? $_SESSION['usuario']['email'] : 'Error'; ?>" class="ng-binding">
                                                                    <?php echo isset($_SESSION['usuario']['email']) ? $_SESSION['usuario']['email'] : 'Error'; ?>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <!-- <tr>
                                                                <th scope="row">Phone</th>
                                                                <td class="ng-binding">(123)-456-7890</td>
                                                            </tr> -->
                                                            <tr>
                                                                <th scope="row">Skype</th>
                                                                <td>
                                                                    <a href="#" class="ng-binding">
                                                                    <?php echo isset($_SESSION['usuario']['skype']) ? $_SESSION['usuario']['skype'] : ''; ?>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div> <!-- end profile-desk -->
                                            </div> <!-- about-me -->

                                            <!-- Activities -->
                                            <div id="user-activities" class="tab-pane">
                                                <div class="timeline-2">
                                                    <div class="time-item">
                                                        <div class="item-info ms-3 mb-3">
                                                            <div class="text-muted">5 minutes ago</div>
                                                            <p><strong><a href="#" class="text-info">John
                                                                        Doe</a></strong>Uploaded a photo</p>
                                                            <img src="assets/images/small/small-3.jpg" alt=""
                                                                height="40" width="60" class="rounded-1">
                                                            <img src="assets/images/small/small-4.jpg" alt=""
                                                                height="40" width="60" class="rounded-1">
                                                        </div>
                                                    </div>

                                                    <div class="time-item">
                                                        <div class="item-info ms-3 mb-3">
                                                            <div class="text-muted">30 minutes ago</div>
                                                            <p><a href="" class="text-info">Lorem</a> commented your
                                                                post.
                                                            </p>
                                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit.
                                                                    Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="time-item">
                                                        <div class="item-info ms-3 mb-3">
                                                            <div class="text-muted">59 minutes ago</div>
                                                            <p><a href="" class="text-info">Jessi</a> attended a meeting
                                                                with<a href="#" class="text-success">John Doe</a>.</p>
                                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit.
                                                                    Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="time-item">
                                                        <div class="item-info ms-3 mb-3">
                                                            <div class="text-muted">5 minutes ago</div>
                                                            <p><strong><a href="#" class="text-info">John
                                                                        Doe</a></strong> Uploaded 2 new photos</p>
                                                            <img src="assets/images/small/small-2.jpg" alt=""
                                                                height="40" width="60" class="rounded-1">
                                                            <img src="assets/images/small/small-1.jpg" alt=""
                                                                height="40" width="60" class="rounded-1">
                                                        </div>
                                                    </div>

                                                    <div class="time-item">
                                                        <div class="item-info ms-3 mb-3">
                                                            <div class="text-muted">30 minutes ago</div>
                                                            <p><a href="" class="text-info">Lorem</a> commented your
                                                                post.
                                                            </p>
                                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit.
                                                                    Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="time-item">
                                                        <div class="item-info ms-3 mb-3">
                                                            <div class="text-muted">59 minutes ago</div>
                                                            <p><a href="" class="text-info">Jessi</a> attended a meeting
                                                                with<a href="#" class="text-success">John Doe</a>.</p>
                                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit.
                                                                    Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- settings -->
                                            <div id="edit-profile" class="tab-pane">
                                                <div class="user-profile-content">
                                                    <form action="index.php?action=updateProfile" method="POST">
                                                        <div class="row row-cols-sm-2 row-cols-1">
                                                            <div class="mb-2">
                                                                <label class="form-label" for="FullName">Full
                                                                    Name</label>
                                                                <input type="text" value="<?php echo ($_SESSION['usuario']['nombre']);?>" id="FullName"
                                                                    class="form-control" name="nombre">
                                                            </div>
                                                            
                                                            <div class="mb-3">
                                                                <label class="form-label" for="Email">Email</label>
                                                                <input type="email" value="<?php echo ($_SESSION['usuario']['email']);?>"
                                                                    id="Email" class="form-control" name="email">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="web-url">Website</label>
                                                                <input type="text" value="<?php echo isset($_SESSION['usuario']['website']) ? $_SESSION['usuario']['website'] : 'Enter your website url'; ?>"
                                                                    id="web-url" class="form-control" name="website">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="skype">Skype</label>
                                                                <input type="text" value="<?php echo isset($_SESSION['usuario']['skype']) ? $_SESSION['usuario']['skype'] : 'Enter your skype'; ?>" id="skype"
                                                                    class="form-control" name="skype">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="password">Password</label>
                                                                <input type="password" placeholder="6 - 15 Characters"
                                                                    id="password" class="form-control" name="password">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="RePassword">New Password (if you want change it)</label>
                                                                <input type="password" placeholder="6 - 15 Characters"
                                                                    id="RePassword" class="form-control" name="re_password">
                                                            </div>
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label" for="description">About Me</label>
                                                                <textarea style="height: 125px;" id="description"
                                                                    class="form-control" name="description"><?php echo isset($_SESSION['usuario']['description']) ? $_SESSION['usuario']['description'] : 'Enter your skype'; ?></textarea>
                                                            </div>

                                                        </div>
                                                        <button class="btn btn-primary" type="submit"><i
                                                                class="ri-save-line me-1 fs-16 lh-1"></i> Save</button>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- profile -->
                                            <div id="projects" class="tab-pane">
                                                <div class="row m-t-10">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Project Name</th>
                                                                        <th>Start Date</th>
                                                                        <th>Due Date</th>
                                                                        <th>Status</th>
                                                                        <th>Assign</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Velonic Admin</td>
                                                                        <td>01/01/2015</td>
                                                                        <td>07/05/2015</td>
                                                                        <td><span class="badge bg-info">Work
                                                                                in Progress</span></td>
                                                                        <td>Techzaa</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Velonic Frontend</td>
                                                                        <td>01/01/2015</td>
                                                                        <td>07/05/2015</td>
                                                                        <td><span
                                                                                class="badge bg-success">Pending</span>
                                                                        </td>
                                                                        <td>Techzaa</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Velonic Admin</td>
                                                                        <td>01/01/2015</td>
                                                                        <td>07/05/2015</td>
                                                                        <td><span class="badge bg-pink">Done</span>
                                                                        </td>
                                                                        <td>Techzaa</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>Velonic Frontend</td>
                                                                        <td>01/01/2015</td>
                                                                        <td>07/05/2015</td>
                                                                        <td><span class="badge bg-purple">Work
                                                                                in Progress</span></td>
                                                                        <td>Techzaa</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>Velonic Admin</td>
                                                                        <td>01/01/2015</td>
                                                                        <td>07/05/2015</td>
                                                                        <td><span class="badge bg-warning">Coming
                                                                                soon</span></td>
                                                                        <td>Techzaa</td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div>
                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <script>
    function changeTab(tabId, link) {
        // Busca el elemento correspondiente al ID de la pestaña
        var tab = document.getElementById(tabId);

        // Si el elemento existe
        if (tab) {
            // Oculta todas las pestañas y desmarca todos los enlaces
            var tabs = document.querySelectorAll('.tab-pane');
            tabs.forEach(function (tab) {
                tab.classList.remove('active'); // Elimina la clase 'active' de todas las pestañas
            });

            var activeLinks = document.querySelectorAll('.nav-link');
            activeLinks.forEach(function (activeLink) {
                activeLink.classList.remove('active'); // Elimina la clase 'active' de todos los enlaces
            });

            // Muestra la pestaña deseada
            tab.classList.add('active'); // Añade la clase 'active' a la pestaña deseada

            // Resalta el enlace activo
            link.classList.add('active'); // Añade la clase 'active' al enlace clicado
        }
    }

</script>

        <!-- end Footer -->