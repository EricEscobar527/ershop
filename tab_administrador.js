$(document).ready(function(){
    $('li.ventas a:first').addClass('active');
    $('.formularios form').hide();
    
    $('li.ventas a').click(function(){
        $('li.ventas a').removeClass('active');
        $(this).addClass('active');
        $('.formularios form').hide();
    
        var activeTab = $(this).attr('href');
        $(activeTab).show();
        return false;
    });  
    });
    $(document).ready(function(){
        $('li.nuevo_producto a:first').addClass('active');
        $('.formularios form').hide();
        
        $('li.nuevo_producto a').click(function(){
            $('li.nuevo_producto a').removeClass('active');
            $(this).addClass('active');
            $('.formularios form').hide();
        
            var activeTab = $(this).attr('href');
            $(activeTab).show();
            return false;
        });  
        });
        $(document).ready(function(){
            $('li.editar_producto a:first').addClass('active');
            $('.formularios form').hide();
            
            $('li.editar_producto a').click(function(){
                $('li.editar_producto a').removeClass('active');
                $(this).addClass('active');
                $('.formularios form').hide();
            
                var activeTab = $(this).attr('href');
                $(activeTab).show();
                return false;
            });  
            });