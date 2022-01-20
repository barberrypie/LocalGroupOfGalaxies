<!doctype html>
<html lang="en">
<head>
    <title>View tables</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ url('css/style.css')}}">
    <link rel="stylesheet" href="{{ url('css/bp.css')}}">

</head>
<body>
<div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="js-fullheight">
        <nav id="colorlib-main-menu" role="navigation">
            <ul>
                <li class="p-0 m-0 mb-4" style="color: #ff6768; font-weight: bold; line-height: 1; font-size: x-large">Местная группа галактик</li>
                <li><a href="{{route("galaxy")}}">Галактики</a></li>
                <li><a href="{{route("stars")}}">Звёзды</a></li>
                <li><a href="{{route("planets")}}">Планеты</a></li>
                <li><a href="{{route("satellites")}}">Спутники</a></li>
                <li><a href="{{route("starclusters")}}">Звёздные скопления</a></li>
                <li><a href="{{route("clusterclasses")}}">Классы звёздных скоплений</a></li>
                <li><a href="{{route("startypes")}}">Типы звёзд</a></li>
                <li><a href="{{route("galaxytypes")}}">Типы галактик</a></li>
            </ul>
        </nav>
    </aside> <!-- END COLORLIB-ASIDE -->

    <div id="colorlib-main">
        <section id="view" class="ftco-intro">
            <div class="container-fluid px-3 px-md-0 pt-5">
                <div class="row">
                    <div class="container">
                        <h1 class="h2">Таблица «{{$name}}»</h1>
                            <table class="table table-striped">
                                <tr>
                                    @foreach($row_name as $el)
                                        <th>{{$el}}</th>
                                    @endforeach
                                </tr>
                                @foreach($data as $value)
                                    <tr>
                                        @foreach(get_object_vars($value) as $el)
                                            <td>{{$el}}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </table>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-danger" onclick="location.href='#delete'">Удалить строки</button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-danger" onclick="location.href='#add_'">Добавить строки</button>
                                </div><div class="col-md-4">
                                    <button class="btn btn-danger" onclick="location.href='#edit'">Редактировать строки</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->

<div id="colorlib-main" class="mt-5 mb-5 ">
    <section id="delete" class="ftco-intro mt-5 mb-5">
        <div class="container-fluid px-3 px-md-0 pt-5">
            <div class="row">
                <div class="container">
                    <h1 class="h2">Удалить строки из таблицы «{{$name}}» </h1>
                    <form method="post">
                        @csrf
                        <table class="table table-striped">
                            <tr>
                                <th>Выбрать</th>
                                @foreach($row_name as $el)
                                    <th>{{$el}}</th>
                                @endforeach
                            </tr>

                            @foreach($data as $value)
                                <tr>
                                    <td><input  class="form-check-input" type="checkbox" name="id[]" value={{$value->id}}}></td>
                                    @foreach(get_object_vars($value) as $el)
                                        <td>{{$el}}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-outline-danger" type="submit" formaction="/{{Route::currentRouteName()}}/delete">Удалить</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <button class="btn btn-danger" type="submit" onclick="location.href='#add_'">Добавить строки</button>
                        </div><div class="col-md-6">
                            <button class="btn btn-danger" type="submit" onclick="location.href='#edit'">Редактировать строки</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->
</section>

<div id="colorlib-main" class="mt-5 mb-5 ">
    <section id="edit" class="ftco-intro mt-5 mb-5">
        <div class="container-fluid px-3 px-md-0 pt-5">
            <div class="row">
                <div class="container">
                    <h1 class="h2">Редактировать поля таблицы «{{$name}}»</h1>
                    <form method="post">
                        @csrf
                        <table class="table table-striped">
                            <tr>
                                <th>Выбрать</th>
                                @foreach($row_name as $el)
                                    <th>{{$el}}</th>
                                @endforeach
                            </tr>
                            @foreach($data as $value)
                                <tr>
                                    <td><input class="form-check-input" type="radio" name="id[]" value={{$value->id}}></td>
                                    @foreach(get_object_vars($value) as $el)
                                        <td>{{$el}}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                            <div class="container mt-3">
                                <div class="row">
                                    @for($i = 0; $i < count($type); $i++)

                                        @if(array_keys(get_object_vars($data[0]))[$i] == "id")
                                            @continue
                                        @endif

                                        <div class="col-md-3 p-0">
                                            <label  class="col-form-label">{{$row_name[$i]}}</label>
                                        </div>

                                        @if($type[$i] == 'text')
                                            <div class="col-md-9 p-0">
                                                <input type="text" maxlength="128" name="{{array_keys(get_object_vars($data[0]))[$i]}}" class="form-control" />
                                            </div>
                                        @elseif($type[$i] == 'number')
                                            <div class="col-md-9 p-0">
                                                <input type="number" name="{{array_keys(get_object_vars($data[0]))[$i]}}" class="form-control" />
                                            </div>
                                        @elseif($type[$i] == 'bool')
                                            <div class="col-md-9 p-0">
                                                <input type="number" max="1" min="0" name="{{array_keys(get_object_vars($data[0]))[$i]}}" class="form-control" />
                                            </div>
                                        @elseif($type[$i] == 'date')
                                            <div class="col-md-9 p-0">
                                                <input type="date" name="{{array_keys(get_object_vars($data[0]))[$i]}}" class="form-control" />
                                            </div>
                                        @endif

                                    @endfor
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button class="btn btn-outline-danger" type="submit" formaction="/{{Route::currentRouteName()}}/update">Обновить</button>
                                </div>
                            </div>
                        </form>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn btn-danger" type="submit" onclick="location.href='#delete'">Удалить строки</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger" type="submit" onclick="location.href='#add_'">Добавить строки</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->

<div id="colorlib-main" class="mt-5 mb-5 ">
    <section id="add_" class="ftco-intro mt-5 mb-5">
        <div class="container-fluid px-3 px-md-0 pt-5">
            <div class="row">
                <div class="container">
                    <h1 class="h2">Добавить строки в таблицу «{{$name}}»</h1>

                    <form class = "second-form" method="post">
                        @csrf
                        <div class="container mt-3">
                            <div class="row">
                                @for($i = 0; $i < count($type); $i++)

                                    @if(array_keys(get_object_vars($data[0]))[$i] == "id")
                                        @continue
                                    @endif

                                    <div class="col-md-3 p-0">
                                        <label  class="col-form-label">{{$row_name[$i]}}</label>
                                    </div>

                                    @if($type[$i] == 'text')
                                        <div class="col-md-9 p-0">
                                            <input type="text" maxlength="128" name="{{array_keys(get_object_vars($data[0]))[$i]}}" class="form-control" />
                                        </div>
                                    @elseif($type[$i] == 'number')
                                        <div class="col-md-9 p-0">
                                            <input type="number" name="{{array_keys(get_object_vars($data[0]))[$i]}}" class="form-control" />
                                        </div>
                                    @elseif($type[$i] == 'bool')
                                        <div class="col-md-9 p-0">
                                            <input type="number" max="1" min="0" name="{{array_keys(get_object_vars($data[0]))[$i]}}" class="form-control" />
                                        </div>
                                    @elseif($type[$i] == 'date')
                                        <div class="col-md-9 p-0">
                                            <input type="date" name="{{array_keys(get_object_vars($data[0]))[$i]}}" class="form-control" />
                                        </div>
                                    @endif

                                @endfor
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button class="btn btn-outline-danger" formaction="/{{Route::currentRouteName()}}/insert">Добавить</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <button class="btn btn-danger" type="submit" onclick="location.href='#delete'">Удалить строки</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-danger" type="submit" onclick="location.href='#edit'">Редактировать строки</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->

<script src={{ url("js/jquery.min.js")}}></script>
<script src={{ url("js/popper.js")}}></script>
<script src={{ url("js/bootstrap.min.js")}}></script>
<script src={{ url("js/main.js")}}></script>

</body>
</html>

