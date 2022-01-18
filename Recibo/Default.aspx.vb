Imports System.IO
Partial Class _Default
    InheritsSystem.Web.UI.Page
  Protected Sub cargar(sender As Object, e As EventArgs) Handles btnGuardar.Click
        Dim firma1 As String
        firma1 = TextBox1.Text + ".jpg"
        Dim sketchData As String = Request.Form("ruta")
        Dim bytes As Byte() = Convert.FromBase64String(sketchData.Split(","c)(1))
        Using imageFile = New FileStream(Server.MapPath((Convert.ToString("~/Imagen/") & firma1) + ""), FileMode.Create)
            imageFile.Write(bytes, 0, bytes.Length)
            imageFile.Flush()
        End Using
        ScriptManager.RegisterStartupScript(Me, Me.GetType(), "alertMessage", "alert('Firma Digitalizada');", True)
    End Sub

End Class