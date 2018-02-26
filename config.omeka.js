// ; MORE OPTIONS
// ; ----
// ; Below are samples of the different types of Configuration options and input types
// ; Remove the semi-colon before the indentifier (e.g. "; sample_text.options" -> "sample_text.options")

// ; Sample Checkbox
// ; sample_checkbox.type = "checkbox"
// ; sample_checkbox.options.label = "Sample Checkbox"
// ; sample_checkbox.options.description = "This is a sample checkbox, for both toggles and selectors."
// ; sample_checkbox.options.value = "1"

// ; Sample Text Input
// ; sample_text.type = "text"
// ; sample_text.options.label = "Sample Text"
// ; sample_text.options.description = "This is a sample input text field, usually for shorter lines of text."
// ; sample_text.options.maxlength = "60"

// ; Sample Text Area
// ; sample_textarea.type = "textarea"
// ; sample_textarea.options.label = "Sample Textarea"
// ; sample_textarea.options.description = "This is a sample textarea, for longer paragraphs of text."
// ; sample_textarea.options.rows = "5"
// ; sample_textarea.options.attribs.class = "html-input"

// ; Sample Select List
// ; sample_select.type = "select"
// ; sample_select.options.label = "Sample Select List"
// ; sample_select.options.description = "This is a sample select list."
// ; sample_select.options.multiOptions.option01 = "Option #1"
// ; sample_select.options.multiOptions.option02 = "Option #2"
// ; sample_select.options.multiOptions.option03 = "Option #3"
// ; sample_select.options.value = "option01"

// ; Sample File
// ; sample_file.type = "file"
// ; sample_file.options.label = "Sample File Picker"
// ; sample_file.options.description = "This is a sample file picker for adding and uploading images and other files."
// ; sample_file.options.validators.count.validator = "Count"
// ; sample_file.options.validators.count.options.max = "1"

const fs = require("fs");

const settings = {
  general: {
    homepage_about: {
      type: "textarea",
      label: "Homepage About Text",
      description: "Our custom homepage about text",
      rows: "5",
      class: "html-input"
    }
  }
};

const output = `
[config]


`;

const groups = `

[groups]

`;

for(const group of Object.keys(settings)) {
  for(const option of Object.keys(settings[group])) {
   for(const param of Object.keys(settings[group][option])) {
     output += `${}`
   }
  }
}
