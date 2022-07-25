<template>
  <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/admin" class="mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4">Resources management</span>
      </a>

      <ul class="nav nav-pills">

        <li class="nav-item">
          <router-link class="nav-link"  :to="{ name: 'home'}">
            <span>Pdf</span>
          </router-link></li>
        <li class="nav-item">
          <router-link class="nav-link" :to="{ name: 'snippet.index'}">
            <span>Html snippet</span>
          </router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="{ name: 'link.index'}">
            <span>Link</span>
          </router-link>
        </li>
      </ul>
    </header>

    <div class="container">
      <router-view></router-view>
    </div>
  </div>

</template>

<style lang="scss">
.router-link-exact-active {
  span {
    border-bottom: 2px solid;
  }
}
</style>
