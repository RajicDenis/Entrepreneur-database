<style>
	.main-container {
        width: 100%;
        min-height: 950px;
    }
    .header {
        position: relative;
        width: 100%;
        height: 400px;
    }
    .hdr-box {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 400px;
    }
    .hdr-bg {
        width: 100%;
        height: 400px;
        background-size: cover;
        pointer-events: none;
    }
    .hdr-logo {
        position: absolute;
        width: 380px;
        height: 140px;
        z-index: 2;
        top: 50px;
        pointer-events: none;
    }
    .db-choice {
        position: absolute;
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 60%;
        height: 150px;
        bottom: -37.5px;
        margin-left: calc((100vw - 60%) / 2);
    }
    .c1 {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        box-shadow: 0 0 8px rgba(8,8,8,0.6);
        background: white;
        font-weight: 600;
        font-style: italic;
        font-family: 'Amaranth', sans-serif;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        color: black;
        font-size: 18px;
    }
    .c1:link {
    	text-decoration: none;
    }
    .c1:visited {
    	text-decoration: none !important;
    	color: black;
    }
    .c1:hover {
        background: #ff003f;
        color: white;
        text-decoration: none;
    }

    @if(Request::segment(1) == 'doo')
    #doo {
        background: #ff003f;
        color: white;
    }
    @endif

    @if(Request::segment(1) == 'obrt')
    #obrt {
        background: #ff003f;
        color: white;
    }
    @endif

    @if(Request::segment(1) == null)
    #svi {
        background: #ff003f;
        color: white;
    }
    @endif

    .mb {
        margin-top:50px;
    }

    .add-new {
        position: absolute;
        top: 25px;
        right: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: white;
        box-shadow: 0 0 8px rgba(8,8,8,0.8);
        transition: all 0.3s ease-in-out;
    }
    .add-new:hover {
        background: #ff003f;
    }
    .add-new-img {
        width: 35px;
        height: 35px;
        background-size: cover;
        pointer-events: none;
    }
    .logout {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        top: 20px;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 10;
    }
    .logout:hover {
        text-decoration: none;
    }
    .glyphicon-off {
        font-size: 20px;
        color: white;
    }
    .glyphicon-off:hover {
        color: #3A6E98;
    }
    .int {
        top: 110px;
        font-size: 25px !important;
        color: #66CC00 !important;
    }
    .srch {
        top: 195px;
        font-size: 25px !important;
        text-decoration: none;
    }
    .srch:hover {
        text-decoration: none;
        color: white;
    }
    .int:hover {
        text-decoration: none;
    }
    .glyphicon-plus .glyphicon-search {
        margin: 0;
    }
    .reg {
        left: 15px;
        top: 200px;
        text-decoration: none;
    }
    .reg:hover {
        text-decoration: none;
        color: white;
    }
    .rec {
        top: 110px;
    }
	.act {
    	top: 290px;
    }
    .glyphicon-send {
        font-size: 20px;
        margin: 0 !important;
    }
    .glyphicon-list-alt {
        font-size: 25px;
        margin: 0 !important;
    }
    .ttt {top:20px;}

    @media all and (max-width: 800px) {
        .db-choice {
            width: 100%;
            margin-left: 0;
        }
    }

    @media all and (max-width: 650px) {
        .hdr-logo {
            width: 280px;
            height: 100px;
            top: 80px;
        }
        .c1 {
            width: 100px;
            height: 100px;
        }
    }

</style>

<div class="header">

    @if(Auth::user())
        <a href="{{ action('LoginController@logout') }}" class="logout"><span class="glyphicon glyphicon-off"></span></a>
    @endif

    <a href="{{ action('CompanyController@create') }}" class="add-new"><img class="add-new-img" src="{{ URL::asset('public/images/add-new.png') }}"></a>

    <a href="{{ action('InterestController@create') }}" class="add-new int"><span class="glyphicon glyphicon-plus"></span></a>

    <a href="{{ action('SearchController@showForm') }}" class="add-new srch"><span class="glyphicon glyphicon-search"></span></a>

    <a href="{{ action('ReceiverController@index') }}" class="add-new reg rec"><span class="glyphicon glyphicon-list-alt"></span></a>

    <a href="{{ action('RegisterController@index') }}" class="add-new reg"><span class="glyphicon glyphicon-send"></span></a>

	<a href="{{ action('ActivityController@index') }}" class="add-new reg act"><span class="glyphicon glyphicon-calendar"></span></a>

    {{--<a href="{{ action('CompanyController@test') }}" class="add-new reg ttt"><span class="glyphicon glyphicon-house"></span></a>--}}

    <div class="hdr-box">
        {{--<img class="hdr-bg" src="{{ URL::asset('public/images/bg1.png') }}">--}}
        <img class="hdr-logo" src="{{ URL::asset('public/images/gras-logo.png') }}">
    </div>
    
    @if(Route::current()->getName() == 'home')
	    <div class="db-choice">
            @if(Request::segment(1) == 'doo')
                 <a href="{{ action('CompanyController@index', 'doo') }}" class="c1" style="background: #ff003f; color: white;">D.O.O.</a>
            @else
                <a href="{{ action('CompanyController@index', 'doo') }}" class="c1">D.O.O.</a>
            @endif

            {{--@if(Request::segment(1) == 'svi' || Request::segment(1) == '')
                 <a href="{{ action('CompanyController@index', null) }}" class="c1" style="background: #ff003f; color: white;">SVI</a>
            @else
                <a href="{{ action('CompanyController@index', null) }}" class="c1">SVI</a>
            @endif--}}

            @if(Request::segment(1) == 'obrt')
                 <a href="{{ action('CompanyController@index', 'obrt') }}" class="c1" style="background: #ff003f; color: white;">OBRT</a>
            @else
                <a href="{{ action('CompanyController@index', 'obrt') }}" class="c1">OBRT</a>
            @endif

            <a href="{{ action('OpgController@index') }}" class="c1" style="color: black;">OPG</a>
        
        	@if(Request::segment(1) == 'udruga')
                 <a href="{{ action('CompanyController@index', 'udruga') }}" class="c1" style="background: #ff003f; color: white;">UDRUGE</a>
            @else
                <a href="{{ action('CompanyController@index', 'udruga') }}" class="c1">UDRUGE</a>
            @endif
	        
	    </div>
	@else
		<div class="db-choice">
	        <a class="c1" href="{{ action('CompanyController@index') }}">Home</a>
	    </div>
	@endif
</div>