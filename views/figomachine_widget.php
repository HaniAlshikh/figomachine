<div class="col-lg-4 col-md-6">

    <div class="panel panel-default" id="figomachine-widget">

        <div class="panel-heading" data-container="body" >

            <h3 class="panel-title"><i class="fa fa-cog"></i> <span data-i18n="figomachine.widget.title"></span></h3>

        </div>

        <div class="list-group scroll-box">
            <span class="list-group-item" data-i18n="loading"></span>
        </div>

    </div><!-- /panel -->

</div><!-- /col -->

<script>
$(document).on('appUpdate', function(e, lang) {

    var box = $('#figomachine-widget div.scroll-box');

    $.getJSON( appUrl + '/module/figomachine/get_list', function( data ) {

        box.empty();
        if(data.length){
            $.each(data, function(i,d){
                var badge = '<span class="badge pull-right">'+d.count+'</span>';
                box.append('<a href="'+appUrl+'/show/listing/figomachine/figomachine/#'+d.name+'" class="list-group-item">'+d.name+badge+'</a>')
            });
        }
        else{
            box.append('<span class="list-group-item">'+i18n.t('no_data')+'</span>');
        }
    });
});
</script>
