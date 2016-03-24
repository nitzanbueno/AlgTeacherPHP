<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
      <head>
        <style>
          .cases{
            width: 500px
          }
        </style>
      </head>
      <body>
        <h2>Alg Teacher</h2>
        <form action="addalg.html">
          <input type="submit" value="Add an Alg" />
        </form>
        <div class="cases">
          <xsl:for-each select="algs/alg">
            <a href="viewalg.php?id={./@id}"><img src="{./image}" /> </a>
          </xsl:for-each>
        </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
