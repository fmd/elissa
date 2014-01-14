(function() {
   tinymce.create('tinymce.plugins.fontawesomelists', {
      init : function(ed, url) {
         ed.addButton('fontawesomelists', {
            title : 'Font Awesome Icons - Lists',
            image : url+'/fontawesomelists.png',
            onclick : function() {
               var name = prompt("Name of icon", "icon-ok");
               var content = prompt("Lists (Example: Wordpress|Twitter|Facebook)", "");

               if (name != null && content != ''){
                     ed.execCommand('mceInsertContent', false, '[iconlists name="'+name+'"]'+content+'[/iconlists]');
               }
               
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Font Awesome Icons - Lists",
            author : 'Terry Tsang',
            authorurl : 'http://www.terrytsang.com',
            infourl : 'http://www.terrytsang.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('fontawesomelists', tinymce.plugins.fontawesomelists);
})();