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

@section('component-sidebar')
<div class='sidebar-section'>

      <div class="control-group">
        <div class="control btn-default">
            <input type="text"  placeholder='Поиск по компоненту' />
            <button class="button"><span uk-icon='search'></span></button>
        </div>
    </div>

    <div class='sidebar-section'>

    <ul class="uk-nav-default" uk-nav>
        
        <li class="uk-parent">
            <a href="#">Громкоговорители <span uk-nav-parent-icon></span></a>
            <ul class="uk-nav-sub">
                <li><a href="#">Sub item</a></li>
                <li>
                    <a href="#">Трансляционные</a>
                    <ul>
                        <li><a href="#">Настенные</a></li>
                        <li><a href="#">Потолочные</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Профессиональные</a>
                    <ul>
                        <li><a href="#">Активные</a></li>
                        <li><a href="#">Пассивные</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="uk-parent">
            <a href="#">Усилители мощности <span uk-nav-parent-icon></span></a>
            <ul class="uk-nav-sub">
                <li><a href="#">Трансляционные</a></li>
                <li><a href="#">Профессиональные</a></li>
            </ul>
        </li>
        <li class="uk-active"><a href="#">Производители</a></li>
    </ul>
    
    </div>

</div>
@endsection