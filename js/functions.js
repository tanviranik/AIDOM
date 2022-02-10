$(function()
			{
			$('#wysiwyg').wysiwyg(
			{
			controls : {
			separator01 : { visible : true },
			separator03 : { visible : true },
			separator04 : { visible : true },
			separator00 : { visible : true },
			separator07 : { visible : false },
			separator02 : { visible : false },
			separator08 : { visible : false },
			insertOrderedList : { visible : true },
			insertUnorderedList : { visible : true },
			undo: { visible : true },
			redo: { visible : true },
			justifyLeft: { visible : true },
			justifyCenter: { visible : true },
			justifyRight: { visible : true },
			justifyFull: { visible : true },
			subscript: { visible : true },
			superscript: { visible : true },
			underline: { visible : true },
            increaseFontSize : { visible : false },
            decreaseFontSize : { visible : false }
			}
			} );
			});
  
        
        
      function hide_n_slide(obj)
      {
           $(obj).fadeTo(400, 0, function () { // Links with the class "close" will close parent
              $(obj).slideUp(400);
              $(obj).stopTime("hide");
            });
      }
      
      
      
      function notification_animation(i, obj)
      {
          $(obj).hide();
          $(obj).oneTime(i*2000, function() {
              $(obj).slideDown(200, function(){
                  $(obj).fadeIn(400, function(){
                  if(!$(obj).hasClass('static')){
                        $(obj).oneTime(20000, "hide", function(){
                                hide_n_slide(obj);
                        })
                      }
                  })
              })
          })
      }   
      
      function create_notification(parent, type, msg, i)
      {
          var span = document.createElement('span');
          $(span).hide();
          $(span).html('<span class="notification n-'+type+'">'+msg+'</span>');
          $(span).appendTo($(parent));
          notification_animation(i, $(span));
          
      }
      
      function sponsor_info_reset()
      {
          $('#sponsor_info').slideUp(200);
          $('#sponsor-status').text('');
          $('#sponsor-contact').text('');
          $("#sponsor_side_left").removeAttr("disabled");
          $("#sponsor_side_right").removeAttr("disabled");
      }
      
      function related_field(field1, field2)
      {
           $(field1).keyup(function(){
              if($(this).val()=='')
              {
                  $(field2).val('');
                  sponsor_info_reset();
              }
           });
           $(field1).keydown(function(){
              if($(this).val()=='')
              {
                  $(field2).val('');
                  sponsor_info_reset();
                  
              }
           });
           
           $(field2).keyup(function(){
              if($(this).val()=='')
              {
                  $(field1).val('');
                  sponsor_info_reset();
              }
           })
           $(field2).keydown(function(){
              if($(this).val()=='')
              {
                  $(field1).val('');
                  sponsor_info_reset();
              }
           })
              
      }
      
      function report_child(obj)
      {
          $('#sponsor-contact').text(obj.contact_no);
          
          if(obj.left_id != 0 && obj.right_id != 0)
          {
              create_notification($('.notifybox'), 'error static', 'No empty side available for '+obj.name+'!', 0);
              $('#sponsor-status').html('This sponsor cannot be selected. No side free');
              
              $("#sponsor_side_left").attr("disabled", "disabled");
              $("#sponsor_side_right").attr("disabled", "disabled");
          }
          else
          {
              create_notification($('.notifybox'), 'success static', ''+obj.name+' has been selected as sponsor!', 0);
              
              if(obj.left_id == 0 && obj.right_id == 0)
              {
                  $('#sponsor-status').html('Both sides are free!');
                  $("#sponsor_side_left").removeAttr("disabled");
                  $("#sponsor_side_right").removeAttr("disabled");
              }
              else if(obj.left_id == 0)
              {
                  $('#sponsor-status').text('Left side is free!');
                  $("#sponsor_side_left").removeAttr("disabled");
                  $("#sponsor_side_right").attr("disabled", "disabled");
              }
              else
              {
                  $('#sponsor-status').text('Right side is free!');
                  $("#sponsor_side_left").attr("disabled", "disabled");
                  $("#sponsor_side_right").removeAttr("disabled");
              }
              
          }
          $('#sponsor_info').slideDown(200);

      }
         
			$(document).ready(function() { 
				$("#myTable") 
				.tablesorter({
					// zebra coloring
					widgets: ['zebra'],
					// pass the headers argument and assing a object 
					headers: { 
						// assign the sixth column (we start counting zero) 
						6: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
		  // uncommenting this line will also allow pager
			//.tablesorterPager({container: $("#pager")});
			
			$('.datepicker').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
        
      $('.datepicker').keyup(function(){
          return false;
      });
			
			$('.notification').each(function(i, obj){
          // hide at first
          notification_animation(i, obj);
          
      })
			
			$('.notification').click(function(){
          hide_n_slide(this);
          return false;
      })
      
      
      $('.confirm_delete').click(function(){
          return confirm('Are you sure to delete?');
      })
      
      related_field($('#sponsor_name'), $('#sponsor_id'));
      
      
      $('#sponsor_name').keyup(function(){
          $('#sponsor_id').val('');
      })
      
      /*
      // auto suggest
      var options_sponsor_name = {
        script:"auto_suggest_sponsor_name",
        varname:"input",
        json:true,
        shownoresults:false,
        maxresults:6,
        callback: function (obj) {
         // hei show some intelligence here
         $('#sponsor_id').val(obj.id);   
         report_child(obj);
        }
      };
      var json = new bsn.AutoSuggest('sponsor_name', options_sponsor_name);
      var options_sponsor_id = {
        script:"auto_suggest_sponsor_id",
        varname:"input",
        json:true,
        shownoresults:false,
        maxresults:6,
        callback: function (obj) {
         // hei show some intelligence here
         $('#sponsor_name').val(obj.info);
         report_child(obj);      
        }
      };
      var json = new bsn.AutoSuggest('sponsor_id', options_sponsor_id);

      */
		})
		
		
		$(function() {
			$('.password').pstrength();
			});