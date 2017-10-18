<template>
    <div >

      <h3>Next5 Application</h3>

      <p>This is a un-authenticated, responsive SPA Race application with Laravel Rest Api on the back. Rest API can be consumed from this application or directly onto the API. The front-end framework is reactive Vue2. Styling is with <b>Bootstrap 3</b></p>

      <p>To demonstrate a race row disappearing after closing time, the closing time is re-seeded everytime you launch the race from this page with just a few minutes apart. For that reason, running with multiple browsers would cause strange behaviour.</p>

      <p>Tested in Chrome and Firefox only.</p>

      <button class="btn btn-primary" @click="onLaunch">Launch Race</button>

    </div>
    
  </template>

  <script>

    import router from '../routes';
    import race from '../models/Race.js'

    export default {

      methods: {
        onLaunch() {
            race.restart().then ( (result) => {
                router.push({name:"Races"})
            })
        }

      }

    }

  </script>
