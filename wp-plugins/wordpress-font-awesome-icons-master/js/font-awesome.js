(function() {
   tinymce.create('tinymce.plugins.fontawesome', {
      init : function(ed, url) {
         ed.addButton('fontawesome', {
            title : 'Font Awesome Icons',
            image : url+'/fontawesomeicons.png',
            onclick : function() {
               var name = prompt("Name of icon", "icon-flag");
               var link = prompt("URL", "http://");
               var target = prompt("Open New Window [YES : 1 | NO : 0]", "0");
               var content = prompt("Text Beside Icon", "");

               if (link == null && link == ''){
                  if (content != null && content != '')
                     ed.execCommand('mceInsertContent', false, '[icon name="'+name+'"]'+content+'[/icon]');
                  else
                     ed.execCommand('mceInsertContent', false, '[icon name="'+name+'"]');
               }
               else{
            	  if (target != null && target != '')
            		  ed.execCommand('mceInsertContent', false, '[icon name="'+name+'" url="'+link+'" target="_blank"]'+content+'[/icon]');
            	  else
            		  ed.execCommand('mceInsertContent', false, '[icon name="'+name+'" url="'+link+'"]'+content+'[/icon]');
               }
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Font Awesome Icons",
            author : 'Terry Tsang',
            authorurl : 'http://www.terrytsang.com',
            infourl : 'http://www.terrytsang.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('fontawesome', tinymce.plugins.fontawesome);
})();