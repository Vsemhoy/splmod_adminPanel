@extends('admin.template.default')

@section('page-content')
<div class='section-data-control'>
    <div class='section-control-group'>
        <div class='control btn-default'>
            <button class='button'>BATON</button>
        </div>
        <div class='control btn-default'>
            <button class='button'>BATON</button>
        </div>
        <div class='control btn-default'>
            <button class='button'>BATON</button>
        </div>
        <div class='control btn-default'>
            <button class='button'>BATON</button>
        </div>
        <select>
            <option>Snow</option>
            <option>Sand</option>
            <option>Leafs</option>
            <option>Water</option>
        </select>
    </div>

    <div class='section-control-group'>
    <div class='control btn-default'>
        <input type='text' />
        <button class='button'>Send</button>
    </div>
        
    </div>

    <div class='section-control-group'>
        <div class='control btn-create'>
            <button class='button'>BRAND NEW</button>
        </div>
    </div>
</div>


    <?php 
    
    $result = "";
    $result .= "";
    $result .= "<table class='master-table'><tbody>";
    for ($i = 0; $i < 33; $i++){
        $row = "<tr>";
        for ($y = 0; $y < 6; $y++){
            $row .= "<td>" . ($i * $y) . "</td>";
        }
        $row .= "</tr>";
        $result .= $row;
    }
    $result .= "</tbody></table>";
    echo $result;
    ?>
@endsection