@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenidos a UNO</div>

                <div class="panel-body">
Esta es una vista ve todas las vistas dentro de la carpeta views y velas abriendo a ver que modificas y que agregas.                
<br>
<b style="color:red;">Este es un texto en negritas</b>

<div class="container">
<div class="row">
<h1>Twitter Profile Card</h1>
<p>You can use with Twitter API, bot or manual.</p>
<!-- code start -->
<div class="twPc-div">
    <a class="twPc-bg twPc-block"></a>

    <div>
        <div class="twPc-button">
            <!-- Twitter Button | you can get from: https://about.twitter.com/tr/resources/buttons#follow -->
            <a href="https://twitter.com/mertskaplan" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false" data-dnt="true">Follow @mertskaplan</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            <!-- Twitter Button -->   
        </div>

        <a title="Mert Salih Kaplan" href="https://twitter.com/mertskaplan" class="twPc-avatarLink">
            <img alt="Mert Salih Kaplan" src="https://pbs.twimg.com/profile_images/378800000352678934/34f9e192635975bf42e534434e2b6273_bigger.jpeg" class="twPc-avatarImg">
        </a>

        <div class="twPc-divUser">
            <div class="twPc-divName">
                <a href="https://twitter.com/mertskaplan">Mert S. Kaplan</a>
            </div>
            <span>
                <a href="https://twitter.com/mertskaplan">@<span>mertskaplan</span></a>
            </span>
        </div>

        <div class="twPc-divStats">
            <ul class="twPc-Arrange">
                <li class="twPc-ArrangeSizeFit">
                    <a href="https://twitter.com/mertskaplan" title="9.840 Tweet">
                        <span class="twPc-StatLabel twPc-block">Tweets</span>
                        <span class="twPc-StatValue">9.840</span>
                    </a>
                </li>
                <li class="twPc-ArrangeSizeFit">
                    <a href="https://twitter.com/mertskaplan/following" title="885 Following">
                        <span class="twPc-StatLabel twPc-block">Following</span>
                        <span class="twPc-StatValue">885</span>
                    </a>
                </li>
                <li class="twPc-ArrangeSizeFit">
                    <a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
                        <span class="twPc-StatLabel twPc-block">Followers</span>
                        <span class="twPc-StatValue">1.810</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- code end -->
</div>
</div>
        </div>
            </div>
        </div>
    </div>
</div>
<style>
.twPc-div {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #e1e8ed;
    border-radius: 6px;
    height: 200px;
    max-width: 340px; // orginal twitter width: 290px;
}
.twPc-bg {
    background-image: url("https://pbs.twimg.com/profile_banners/50988711/1384539792/600x200");
    background-position: 0 50%;
    background-size: 100% auto;
    border-bottom: 1px solid #e1e8ed;
    border-radius: 4px 4px 0 0;
    height: 95px;
    width: 100%;
}
.twPc-block {
    display: block !important;
}
.twPc-button {
    margin: -35px -10px 0;
    text-align: right;
    width: 100%;
}
.twPc-avatarLink {
    background-color: #fff;
    border-radius: 6px;
    display: inline-block !important;
    float: left;
    margin: -30px 5px 0 8px;
    max-width: 100%;
    padding: 1px;
    vertical-align: bottom;
}
.twPc-avatarImg {
    border: 2px solid #fff;
    border-radius: 7px;
    box-sizing: border-box;
    color: #fff;
    height: 72px;
    width: 72px;
}
.twPc-divUser {
    margin: 5px 0 0;
}
.twPc-divName {
    font-size: 18px;
    font-weight: 700;
    line-height: 21px;
}
.twPc-divName a {
    color: inherit !important;
}
.twPc-divStats {
    margin-left: 11px;
    padding: 10px 0;
}
.twPc-Arrange {
    box-sizing: border-box;
    display: table;
    margin: 0;
    min-width: 100%;
    padding: 0;
    table-layout: auto;
}
ul.twPc-Arrange {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.twPc-ArrangeSizeFit {
    display: table-cell;
    padding: 0;
    vertical-align: top;
}
.twPc-ArrangeSizeFit a:hover {
    text-decoration: none;
}
.twPc-StatValue {
    display: block;
    font-size: 18px;
    font-weight: 500;
    transition: color 0.15s ease-in-out 0s;
}
.twPc-StatLabel {
    color: #8899a6;
    font-size: 10px;
    letter-spacing: 0.02em;
    overflow: hidden;
    text-transform: uppercase;
    transition: color 0.15s ease-in-out 0s;
}
</style>
@endsection
