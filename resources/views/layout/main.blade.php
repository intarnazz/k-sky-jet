<style>
  .main {
    padding: 2rem 0;
    flex: 1;
  }

  /*.bg {*/
  /*  position: sticky;*/
  /*  top: 0;*/
  /*  left: 0;*/
  /*  width: 100%;*/
  /*  height: 70dvh;*/
  /*  margin-bottom: -70dvh;*/
  /*  background: linear-gradient(#0777ff, #ffffff00);*/
  /*}*/

  .main__content {
    padding-top: 2rem;
  }

  .main {
    padding-top: 0;
  }
</style>

<main class="main relative box-y gap2">
{{--  <div class="bg"></div>--}}
  <div class="main__content relative">
    {{ $slot }}
  </div>
  <div class="flex"></div>
</main>

<script>

</script>
