<div>
	<table>
		<tr>
		    <th>id</th>
		    <th>text</th>
		    <th>action</th>
		  </tr>
		<tr v-for="note in notes">
			<td>{{ note.id }}</td>
			<td>{{ note.text }}</td>
			<td>
				<div 
					v-on:click="deleteNote(note)"
					style="background-color:red; color:#ffffff; padding: 5px;">
					DELETE
				</div>
			</td>
		</tr>
	</table>
	<div>
		<textarea rows="4" cols="50" v-model="text"></textarea>
		<br>
		<div 
			v-on:click="addNote()"
			style="background-color:green; color:#ffffff; padding: 5px; display:inline-block;">
			Add
		</div>
	</div>
</div>