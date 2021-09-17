
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

     
    })(jQuery);

  
    
        

     


   
    











