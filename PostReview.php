<!DOCTYPE html>
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
      <head>
      </head>
      <body> 
            <br>
            <table style="width:35%" align="center">     
                  <form action="Controller.php" method="post" id="form1" enctype="multipart/form-data">
                  <tr>
                        <td>Image :</td>

                        <td ><input type="file" name="image" id="fileToUpload"></td>
                  </tr>
                  <tr>
                        <td>Topic :</td> 
                        <td><input type="text" name="topic" size="52" style="color:black;"></td>
                  </tr>
                  <tr>
                        <td>Detail : <br><br><br><br></td>
                        <td><textarea rows="5" cols="50" name="detail"></textarea></td>
                  </tr>
                  <tr>
                        <td>Latitude : </td>
                        <td><input type="text" name="lat" size="10"></td>
                  </tr>
                  <tr>
                        <td>Longitude : </td>
                        <td><input type="text" name="long" size="10"></td>
                  </tr>
                  <tr>
                        <td>Tag : </td>
                        <td><input type="text" name="tag" size="52"></td>
                  </tr>
                  <td colspan="2" align="center" >
                        <button  type="submit" form="form1" name="submit" style="color:black;">Submit</button>
                  </td>
                  </form>
            </table>  
      </body>
</html>
