<template>
  <nav
    class="
      layout-navbar
      container-xxl
      navbar navbar-expand-xl navbar-detached
      align-items-center
      bg-navbar-theme
    "
    id="layout-navbar"
  >
    <div
      class="
        layout-menu-toggle
        navbar-nav
        align-items-xl-center
        me-3 me-xl-0
        d-xl-none
      "
    >
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>
    <div
      class="navbar-nav-right d-flex align-items-center"
      id="navbar-collapse"
    >
      <!-- Search -->
      <div class="navbar-nav align-items-center me-2">
        <div class="nav-item d-flex align-items-center">
          <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
              <!-- <a
                class="nav-link hide-arrow position-relative"
                href="javascript:void(0);"
                data-bs-toggle="dropdown"
              >
                <i class="bx bx-chat me-1 fs-3"></i>
                <span
                  class="
                    badge badge-center
                    rounded-pill
                    bg-danger
                    w-px-20
                    h-px-20
                    position-absolute
                  "
                  style="top: 0; right: 0"
                  >4</span
                >
              </a>
              <ul class="dropdown-menu dropdown-menu">
                <li>
                  <a class="dropdown-item" href="#">
                    <i class="bx bx-user me-2"></i>
                    <span class="align-middle">My Profile</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <i class="bx bx-cog me-2"></i>
                    <span class="align-middle">Settings</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <span class="d-flex align-items-center align-middle">
                      <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                      <span class="flex-grow-1 align-middle">Billing</span>
                      <span
                        class="
                          flex-shrink-0
                          badge badge-center
                          rounded-pill
                          bg-danger
                          w-px-20
                          h-px-20
                        "
                        >4</span
                      >
                    </span>
                  </a>
                </li>
              </ul> -->
              <a href="/" class="nav-link fs-5 fw-bolder">Visiter le site</a>
            </li>
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
              <a
                class="nav-link hide-arrow position-relative"
                href="javascript:void(0);"
                data-bs-toggle="dropdown"
              >
                <i class="bx bx-bell me-1 fs-3"></i>
                <span
                  class="
                    badge badge-center
                    rounded-pill
                    bg-danger
                    w-px-20
                    h-px-20
                    position-absolute
                  "
                  style="top: 0; right: 2px"
                  >10</span
                >
              </a>
              <ul class="dropdown-menu dropdown-menu">
                <li>
                  <a class="dropdown-item" href="#">
                    <i class="bx bx-user me-2"></i>
                    <span class="align-middle">My Profile</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <i class="bx bx-cog me-2"></i>
                    <span class="align-middle">Settings</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <span class="d-flex align-items-center align-middle">
                      <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                      <span class="flex-grow-1 align-middle">Billing</span>
                      <span
                        class="
                          flex-shrink-0
                          badge badge-center
                          rounded-pill
                          bg-danger
                          w-px-20
                          h-px-20
                        "
                        >4</span
                      >
                    </span>
                  </a>
                </li>
              </ul>
            </li>
            <!--/ User -->
          </ul>
        </div>
      </div>
      <!-- /Search -->

      <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Place this tag where you want the button to render. -->
        <li class="nav-item lh-1 me-3">
          <a>Se deconnecter</a>
        </li>

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a
            class="nav-link dropdown-toggle hide-arrow"
            href="javascript:void(0);"
            data-bs-toggle="dropdown"
          >
            <div
              class="avatar avatar-online bg-dark rounded-circle text-center"
            >
              <span class="text-white fs-3 pb-1">A</span>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <!-- <img
                        src="../assets/img/avatars/1.png"
                        class="w-px-40 h-auto rounded-circle"
                      /> -->
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block">John Doe</span>
                    <small class="text-muted">Admin</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Profile</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">Settings</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <span class="d-flex align-items-center align-middle">
                  <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                  <span class="flex-grow-1 align-middle">Billing</span>
                  <span
                    class="
                      flex-shrink-0
                      badge badge-center
                      rounded-pill
                      bg-danger
                      w-px-20
                      h-px-20
                    "
                    >4</span
                  >
                </span>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="auth-login-basic.html">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>
  </nav>
</template>
