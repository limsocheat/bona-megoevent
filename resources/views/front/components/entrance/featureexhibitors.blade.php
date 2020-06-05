<style>
    .card{
        width:auto;
        height: 391.36px;
    }
    .block-ellipsis {
        display: block;
        display: -webkit-box;
        max-width: 100%;
        height: 55%;
        margin: 0 auto;
        font-size: 14px;
        line-height: 2;
        -webkit-line-clamp: 6;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .form{
        width:100%;
        height:50%;
        border:solid 2px gray;
    }
</style>
<div class="col-md-4 mb-4">

	<div class="card">
		<img src="{{asset('images/image1.jpg')}}" alt="" class="card-img-top">
		<div class="card-body">
            <h5 class="card-title text-truncate" style="max-lines:2; color: red;">24 MAY</h5>
			<h5 class="card-title text-truncate" style="max-lines: 2">Hari Raya Aidilfitri</h5>
			<p class="card-text block-ellipsis"  style="max-lines: 5"> On Hari Raya Aidilfitri, Muslims
                in Singapore end their time of fasting with a joyous 
                celebration of forgiveness, fellowship and food.</p>
		</div>
	</div>
	</div>
    <div class="col-md-4 mb-4">
	<div class="card">
		<img src="images/image1.jpg" alt="" class="card-img-top">
		<div class="card-body">
            <h5 class="card-title text-truncate" style="max-lines:2; color: red;">45 JUN</h5>
			<h5 class="card-title text-truncate" style="max-lines: 2">Hari Raya Aidilfitri</h5>
			<p class="block-ellipsis">
                This is an example of a multi-line ellipsis. We just set the number of lines we want to display before the ellipsis takes into effect and make some changes to the CSS and the ellipsis should take into effect once we reach the number of lines we want.
            </p>
		</div>
	</div>
</div>
<div class="col-md-4 mb-4">
    <div class="card">
        <form class="text-center border border-light p-5" action="#!">
            <p class="h4 mb-4">Sign in</p>
            <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="EMAI ADDRESS">
            <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="PASSWORD">
            <div class="d-flex justify-content-around">
            </div>
            <button class="btn btn-info btn-block my-4" type="submit">SIGN UP FREE</button>
        </form>
    </div>
</div>