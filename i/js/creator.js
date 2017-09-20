var pack = {
  htmlTemplates: [],
  sections: {}
};

init();


function init() {
  $('.main-block-available div').click(addTemplate);
  $(".add-section").click(addSection);
}

 $('#create').click(function() {
   createPack();
   console.log("Click");
   $.post("http://a0091949.xsph.ru/index.php?q=admin/coreProject/create_project", $.param(pack), function(response){
     $('body').html(response);
   });

 });

 $('#create2').click(function() {
   createPack2();
   console.log("Click");
   $.post("http://a0091949.xsph.ru/index.php?q=admin/coreProject/create_raz", $.param(pack), function(response){
     $('body').html(response);
   });

 });
function createPack2() {
  pack.source_project = $("input[name='source_project']").val();
  pack.new_project = $("input[name='new_project']").val();

  $('.section').each(function() {
    var sectionName = $("input[name='section_name']", this).val();
    pack.sections[sectionName] = {};
    pack.sections[sectionName].alias = $("input[name='alias_name']", this).val();
    pack.sections[sectionName].sectionRus = $("input[name='section_name_rus']", this).val();
    pack.sections[sectionName].section_catalog = $("#section_catalog", this).val();
    pack.sections[sectionName].section_item = $("#section_item", this).val();

    pack.sections[sectionName].fieldName = [];
    pack.sections[sectionName].fieldType = [];
    pack.sections[sectionName].fieldIndex = [];

    $("input[name='field_name[]']", this).each(function() {
      pack.sections[sectionName].fieldName.push($(this).val());
    });

    $("input[name='field_type[]']", this).each(function() {
      pack.sections[sectionName].fieldType.push($(this).val());
    });

    $("textarea[name='field_index[]']", this).each(function() {
      pack.sections[sectionName].fieldIndex.push($(this).val());
    });
  });
}

function createPack() {
  pack.source_project = $("input[name='source_project']").val();
  pack.new_project = $("input[name='new_project']").val();
  pack.db_name = $("input[name='db_name']").val();
  pack.db_host = $("input[name='db_host']").val();
  pack.db_login = $("input[name='db_login']").val();
  pack.db_pass = $("input[name='db_pass']").val();
  pack.header = $("textarea[name='header']").val();
  pack.footer = $("textarea[name='footer']").val();
  pack.site_name = $("input[name='site_name']").val();
  pack.project_name = $("input[name='project_name']").val();
  pack.admin_mail = $("input[name='admin_mail']").val();
  pack.admin_pass = $("input[name='admin_pass']").val();
  pack.admin_name = $("input[name='admin_name']").val();
  pack.admin_phone1 = $("input[name='admin_phone1']").val();
  pack.admin_phone2 = $("input[name='admin_phone2']").val();
  pack.site_adress = $("input[name='site_adress']").val();

  $('.section').each(function() {
    var sectionName = $("input[name='section_name']", this).val();
    pack.sections[sectionName] = {};
    pack.sections[sectionName].alias = $("input[name='alias_name']", this).val();
    pack.sections[sectionName].sectionRus = $("input[name='section_name_rus']", this).val();

    pack.sections[sectionName].fieldName = [];
    pack.sections[sectionName].fieldType = [];
    pack.sections[sectionName].fieldIndex = [];

    $("input[name='field_name[]']", this).each(function() {
      pack.sections[sectionName].fieldName.push($(this).val());
    });

    $("input[name='field_type[]']", this).each(function() {
      pack.sections[sectionName].fieldType.push($(this).val());
    });

    $("input[name='field_index[]']", this).each(function() {
      pack.sections[sectionName].fieldIndex.push($(this).val());
    });
  });
}

function removeTemplate() {
  var $block = $($(this).get(0).parentElement);
  var value = $block.text();
  var newBlock = $("<div></div>");

  $(newBlock).text(value);
  $(newBlock).click(addTemplate);
  $(".main-block-available").append(newBlock);

  pack.htmlTemplates.splice($.inArray(value, pack.htmlTemplates), 1);
  $block.remove();
}

function addTemplate() {
  var value = $(this).text();
  pack.htmlTemplates.push(value);

  var newBlock = $("<div></div>");
  $(newBlock).html(value + "<i class='uk-close'></i>");
  $("i", newBlock).click(removeTemplate);

  $('.main-block-list').append(newBlock);
  $(this).remove();
}

function addSection() {
  var sectionNumber = $('.section').length;
  var $tabSection = $("<li><a href=''> Section" + sectionNumber + "</a></li>");
  var $section = $("<li class='section'></li>");

  $tabSection.addClass("section" + sectionNumber);
  $section.addClass("section" + sectionNumber);

  $(".add-section").parents("li").first().before($tabSection);

  $section.data("section", "section" + sectionNumber);

  var $removeBtn = $("<div class='remove-section'>-</div>");
  $removeBtn.click(removeSection);
  $($section).append($removeBtn);

  addFields($section);
  $("#my-id").append($section);

}

function removeSection() {
  $("." + $(this).parents("li").first().data("section")).remove();
}

function addFields(section) {
  $(section).append($("<div class='uk-form-row uk-margin-top'><input type='text' class='uk-width-1-1' name='section_name' placeholder='aliases' required></div>"));
  $(section).append($("<div class='uk-form-row uk-margin-top'><input type='text' class='uk-width-1-1' name='alias_name' placeholder='alias' required></div>"));
  $(section).append($("<div class='uk-form-row uk-margin-top'><input type='text' class='uk-width-1-1' name='section_name_rus' placeholder='section name rus'></div>"));
  $(section).append($("<div class='uk-form-row uk-margin-top'><textarea rows='4' class='uk-width-1-1' name='section_catalog' placeholder='Html каталогов'></textarea></div>"));
  $(section).append($("<div class='uk-form-row uk-margin-top'><textarea rows='4' class='uk-width-1-1' name='section_item' placeholder='Html элементов'></textarea></div>"));

  var addFields = $("<div class='add-fields'>+</div>");
  $(addFields).click(function() {
    addDbFields(this.parentElement);
  });

  $(section).append(addFields);
  addDbFields(section);
}

function addDbFields(section) {
  $(section).append($("<input type='test' name='field_name[]' placeholder='field name'> <br>"));
  $(section).append($("<input type='test' name='field_type[]' placeholder='field type'> <br>"));
  $(section).append($("<input type='test' name='field_index[]' placeholder='field index'> <br> <hr>"));
}

function addDbFields2(section) {
  $(section).append($("<input name='field_name[]' placeholder='Название поле (лат.)' class='uk-width-1-1 uk-form uk-margin-top'>"));
  $(section).append($("<input name='field_type[]' placeholder='SQL запрос' class='uk-width-1-1 uk-form uk-margin-top'>"));
  $(section).append($("<textarea name='field_index[]' id='field_index[]' rows='4' class='uk-width-1-1 uk-form uk-margin-top'></textarea>  <hr>"));
}