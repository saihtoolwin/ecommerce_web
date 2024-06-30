<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <div class="col-1 col-md-2 d-flex justify-content-center">
        <a class="navbar-brand" href="/">
          <img
            src="@/assets/img/logo-no-background.png"
            alt=""
            style="height: auto"
            width="100px"
          />
        </a>
      </div>
      <div class="row col-10">
        <div class="col-12 d-flex">
          <div class="form col-lg-12 col-md-11 col-sm-11">
            <i class="fa fa-search"></i>
            <input
              type="text"
              class="form-control form-input"
              placeholder="Search anything..."
            />
            <span class="left-pan"><i class="fa fa-microphone"></i></span>
          </div>
          <!-- Burgur Btn -->
          <button
            class="col-1 navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarColor04"
            aria-controls="navbarColor04"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <Slide>
              <a id="home" href="#">
                <span>Home</span>
              </a>
            </Slide>
            <!-- <span class="navbar-toggler-icon"></span> -->
          </button>
        </div>

        <div class="collapse col-12 navbar-collapse" id="navbarColor04">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#"
                >Home
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
                >Dropdown</a
              >
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
              </div>
            </li>
          </ul>
          <form class="d-flex">
            <input
              class="form-control me-sm-2"
              type="search"
              placeholder="Search"
            />
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import { Slide } from "vue-burger-menu";
export default {
  name: "NavBar",
  components: {
    Slide,
  },
};
</script>

<style>
.form {
  position: relative;
}

.form .fa-search {
  position: absolute;
  top: 20px;
  left: 20px;
  color: #9ca3af;
}

.form span {
  position: absolute;
  right: 17px;
  top: 13px;
  padding: 2px;
  border-left: 1px solid #d1d5db;
}

.left-pan {
  padding-left: 7px;
}

.left-pan i {
  padding-left: 10px;
}

.form-input {
  height: 55px;
  text-indent: 33px;
  border-radius: 10px;
}

.form-input:focus {
  box-shadow: none;
  border: none;
}
</style>
