package br.senai.sp.projeto6;

import android.content.Context;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;

import java.lang.reflect.Field;
import java.util.ArrayList;
import java.util.List;


public class MainActivity extends ActionBarActivity {

    /*

   Esta aplicação foi feita para mostrar a aplicação das listas no android
   @date:18/02/2015
   @author:Ramon Lacava 3IT
     */

    /*

    Aqui é criado uma lista privada com nome de fonte de dados
    O campo
     */

    /*
    o método getDeclaredFields retorna o conjunto dos icones disponiveis na biblioteca
    Aqui também está sendo criado o arraylist dados que armazena dos icones do menu

     */
    private List<Field> fonteDados() {
        Field[] campos = android.R.drawable.class.getDeclaredFields();
        List<Field> dados = new ArrayList<Field>();
        for (Field campo: campos) {
            if (campo.getName().startsWith("ic_menu_")) {
                dados.add(campo);
            }
        }
        return dados;
    }

    //Sem o adapter a interface e a classe não podem trabalhar juntas
    //a lista precisa de uma classe que herde das funcionalidades do arrayadapter
    private class MeuAdapter extends ArrayAdapter<Field> {
        private final Context context;
        private List<Field> dados;
//a classe ArrayAdapter possui objetos da classe field
        //o meu adapter recebe o contexto e os dados
        public MeuAdapter(Context context, List<Field> dados) {
            super(context, R.layout.activity_lista, dados);
            this.context = context;
            this.dados = dados;
        }

        /*
        o getView monta linha por linha

         */
        @Override
        public View getView(int position, View convertView, ViewGroup parent) {
            LayoutInflater inflater = (LayoutInflater) context
                    .getSystemService(Context.LAYOUT_INFLATER_SERVICE);//aqui é usado o layout inflater para obter o segundo layout criado
            View view = inflater.inflate(R.layout.activity_lista, parent, false);
            //o campo atual recebe o icone
            Field atual = dados.get(position);
            int resourceId = 0;
            try {
                //o get int converte o elemento para a id
                resourceId = atual.getInt(new Object());
            } catch (Exception e) {
            }
            //aqui é pego o icone e o titulo da imagem
            ImageView icone = (ImageView)view.findViewById(R.id.icone);;
            icone.setImageResource(resourceId);
            TextView titulo = (TextView)view.findViewById(R.id.titulo);
            titulo.setText(atual.getName());
            return view;
        }
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        //aqui é criado um objeto da classe lista
        ListView lista = (ListView) findViewById(R.id.lista);
        lista.setAdapter(new MeuAdapter(this, fonteDados()));
        // o set adapter recebe o objeto da classe arrayadapter
    }


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
