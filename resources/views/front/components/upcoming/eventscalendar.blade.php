<style>
    .card{
        width:auto;
        height: 435.36px;
    }
    .block-ellipsis {
        display: block;
        display: -webkit-box;
        max-width: 100%;
        height: 53%;
        margin: 0 auto;
        font-size: 14px;
        line-height: 2;
        -webkit-line-clamp: 6;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .inline{
        margin-top:-16px;
    }
    .btn-circle {
        width: 30px;
        height: 30px;
        padding:0 3px 0 0;
        border-radius: 15px;
        text-align: center;
        font-size: 19px;
        line-height: 1;
        border:solid 1px gray;
        background:#ffffff;
    }
    .card-body h5{
        font-size:14px;
        color:red;
    }
    .card-body h4{
        font-weight:bold;
        font-size: 2.25em;
    }
    .card-body p{
        font-size: 1.2em;
        line-height:1.375;
    }
</style>
<div class="col-md-3">
    <div class="card mb-5">
        <div class="view overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/food.jpg" alt="Card image cap">
        </div>
        <div class="inline ml-auto mr-3">
            <button type="button" class="btn btn-default btn-circle ml-auto mr-4">
                <i class="fa fa-arrow-up pl-1"></i>
            </button>
            <button type="button" class="btn btn-default btn-circle ml-auto">
                <i class="fa fa-heart pl-1"></i>
            </button>
        </div>
        <div class="card-body">
            <h5>Wed,May 27, 13:00</h5>
            <h4 class="card-title text-truncate">Albaba Cloud-SUSS Online Demo Day 2020</h4>
            <hr>
            <p class="card-text block-ellipsis"  style="max-lines: 5"> On Hari Raya Aidilfitri, Muslims
                in Singapore end their time of fasting with a joyous 
                celebration of forgiveness, fellowship and food.</p>
        </div>
    </div>
</div>