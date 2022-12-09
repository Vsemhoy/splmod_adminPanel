@extends('admin.template.default')

@section('page-cards')
    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin uk-card-secondary uk-card-hover uk-card-body uk-light" uk-grid>
    <div class="uk-card-media-left uk-cover-container">
        <h1>SPLmodule</h1>
    </div>
    <div>
        <div class="uk-card-body">
            <h3 class="uk-card-title">Media Left</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
        </div>
    </div>
</div>
<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
    <div class="uk-card-media-left uk-cover-container">
        <img src="images/light.jpg" alt="" uk-cover>
        <canvas width="600" height="400"></canvas>
    </div>
    <div>
        <div class="uk-card-body">
            <h3 class="uk-card-title">Media Left</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
        </div>
    </div>
</div>

@endsection

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