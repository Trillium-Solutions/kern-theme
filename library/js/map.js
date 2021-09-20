
(function($) {

        var $highlights = $('#highlights');
        console.log($highlights);
        $('#hovers > *').on('mouseenter', function() {
            var target = this.dataset.name;
            $highlights.find('[data-name="' + target + '"] > *').css('opacity', '1.0');
        }).on('mouseleave', function() {
            var target = this.dataset.name;
            $highlights.find('[data-name="' + target + '"] > *').css('opacity', '0');
        }).on('click tap', function() {
            var target = this.dataset.name;
            target = (target.replace(' ', '-')).toLowerCase();
            window.location.href = 'routes/' + target;
        });

        $('#trip-planner-container').click(function() {
            if($('#planner-expand-contract-tab').text() != 'hide') {
                $(this).find('.min-hide').css('display', 'table-row');
                $('#planner-expand-contract-tab').text('hide');
                 $('#trip-planner-container').removeClass('minimized').addClass('expanded');
                  $('#planner-expand-contract-tab').removeClass('minimized').addClass('expanded');
            }
            
        });
        
        $('#planner-expand-contract-tab').click(function() {
            if($(this).text() == 'hide') {
                 $('#trip-planner-container').removeClass('expanded').addClass('minimized');
                 $('#planner-expand-contract-tab').removeClass('expanded').addClass('minimized');
                 $('#trip-planner-container .min-hide').css('display', 'none');
                 $('#planner-expand-contract-tab').text('expand');  
            } else {
                $('#trip-planner-container').find('.min-hide').css('display', 'table-row');
                $('#planner-expand-contract-tab').text('hide');
                $('#trip-planner-container').removeClass('minimized').addClass('expanded');
                $('#planner-expand-contract-tab').removeClass('minimized').addClass('expanded');
            }
        
        });

        

     
    })(jQuery);

  
    
        

     


   
    











