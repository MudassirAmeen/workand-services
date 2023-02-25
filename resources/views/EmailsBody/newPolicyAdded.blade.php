<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Policay</title>
</head>
<body>
    
    <h2>
        {{$data->heading}}
    </h2>
    <div id="longdescription">
        {{$data->longdescription}}
    </div>
    <a href="{{route('privacy')}}">Privacy Page</a>
</body>
{{--  <script>
    var data = {!! json_encode($policy->longdescription, JSON_HEX_TAG) !!};
    document.querySelector('#longdescription').innerHTML = data
    console.log(data)
</script>  --}}
</html>