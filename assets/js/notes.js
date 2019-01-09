function Notes(userId, notes, template)
{
	this.methods = {};

	this.el = "#notes";

	this.data = function()
	{
		return {
			'notes' : notes,
			'text' : '',
			'userId' : userId
		}
	}

	this.template = template;

	this.methods.deleteNote = function(note)
	{
		this.$http.post('/dashboard/notes/'+note.id+'/delete', {}).then(function(response){
			if (response.body.success) {
				for(var i = 0; i < this.notes.length; i++) {
					if (this.notes[i].id == note.id) {
						break;
					}
				}
				this.notes.splice(i, 1);
			}
        });
	}

	this.methods.addNote = function()
	{	
		var note = {
	        "text" : this.text,
		};

		this.$http.post('/dashboard/notes/add', note).then(function(response){
			if (response.body.id != undefined) {
				this.notes.push(response.body);
				this.text = "";
			}
        });
	}

	return new Vue(this);
}