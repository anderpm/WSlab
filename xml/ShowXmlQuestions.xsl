<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="assessmentItems">
<html>
<body>
<table border="1">
<thead bgcolor="#5e81ac">
  <tr>
    <th>Eposta</th>
    <th>Arloa</th>
    <th>Galdera</th>
    <th>Zuzena</th>
    <th>Okerrak</th>
  </tr>
</thead>
   <xsl:for-each select="assessmentItem">
       <tr>
           <td>
               <xsl:value-of select="@author"/>
           </td>
           <td>
               <xsl:value-of select="@subject"/>
           </td>
           <td>
               <xsl:value-of select="itemBody/p"/>
           </td>
           <td>
               <xsl:value-of select="correctResponse/response"/>
           </td>
           <xsl:variable name="incorrect" select="incorrectResponses/response"/> 
           <td>
               <xsl:value-of select="$incorrect[1]"/>
               <br/>
               <xsl:value-of select="$incorrect[2]"/>
               <br/>
               <xsl:value-of select="$incorrect[3]"/>
               
           </td>
           
       </tr>  
    </xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
