package br.senai.sp.aplicacao;

import android.app.AlertDialog;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import org.w3c.dom.Text;


public class MainActivity extends ActionBarActivity {
    private EditText valor1;
    private EditText valor2;
    private EditText valor3;
    private Button soma;
    TextView MediaFinal;
    private double nota1;
    private double nota2;
    private double nota3;
    private double n1;
    private double n2;
    private double n3;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        valor1 =(EditText) findViewById(R.id.valor1);
        valor2 =(EditText) findViewById(R.id.valor2);
        valor3 =(EditText) findViewById(R.id.valor3);
        soma =(Button) findViewById(R.id.soma);
        MediaFinal = (TextView) findViewById(R.id.MediaFinal);
        soma.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                n1 = Double.parseDouble(String.valueOf(valor1.getText()));
                n2 = Double.parseDouble(String.valueOf(valor2.getText()));
                n3 = Double.parseDouble(String.valueOf(valor3.getText()));

                Double media = MainActivity.this.calcularMedia(n1, n2, n3);
                MediaFinal.setText(String.valueOf(media));
            }
        });



    }


    private double calcularMedia(double n1,double n2 , double n3){
        this.n1 = n1;
        this.n2 = n2;
        this.n3 = n3;
        double MediaFinal = (n1 + n2 + n3) / 3;
        return MediaFinal;
    }




/*
    public void somar(View view){
        EditText valor1 = (EditText) findViewById(R.id.valor1);
        int n = Integer.parseInt(valor1.getText().toString());
        EditText valor2 = (EditText) findViewById(R.id.valor2);
        int n2 = Integer.parseInt(valor2.getText().toString());
        EditText valor3 = (EditText) findViewById(R.id.valor3);
        int n3 = Integer.parseInt(valor3.getText().toString());

        int media = (n + n2 + n3)/3;



        AlertDialog a;
        a = new AlertDialog.Builder(this).create();
        a.setTitle("Média");
        a.setMessage("Média:" + media);
        a.show();

    }

*/
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
