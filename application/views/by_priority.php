<h3>Tasks by Priority</h3>
<form method='POST' action='{completer}'>
  <table class="table">
      <tr>
        <th>Id</th>
        <th></th>   <!-- INSERT this line -->
        <th>Task</th>
      </tr>
      <tr>
        <td>{id}</td>
        <!-- INSERT the line below -->
        <td><input type='checkbox' name='task{id}'/></td>
        <td>{task}</td>
      </tr>
  </table>
<input type='submit' value='Complete checked tasks'/>
</form><!--change -->
