<script>
export default {
    name: "singleRestautants",
}
</script>

<template>
    <div class="video_container m-0 p-0 bg-black ">
        <video class="video_bg" src="../../public/img/home/video-jumbo1.mp4" autoplay loop muted></video>
        <a id="link_anchor" href="#resturant">
            <h2>
                Inizia ad ordinare! <br>
                Visualizza i nostri locali
            </h2>
        </a>
    </div>
</template>

<style lang="scss" scoped>
@use '../assets/scss/general.scss' as *;
@use '../assets/scss/partials/variables.scss' as *;

.video_container {
    position: relative;

}

#link_anchor {
    text-decoration: none;
    background-color: #00ff8454;
    color: white;
    z-index: 50000000000;
    position: absolute;
    left: 35%;
    top: 45%;
    padding: 10px;
    border-radius: 50px;
    width: 25%;
    text-align: center;

    h2 {
        font-weight: 900;

        span {
            font-size: 5px;
        }
    }


}
</style>