package br.senai.sp.cadastro;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.ContextMenu;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import java.util.List;

public class MainActivity extends Activity {
    private ListView listaClientes;
    private List<Mcliente> clientes;
    private Mcliente clienteSelecionado;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        this.listaClientes =(ListView) findViewById(R.id.Lista_clientes);
        ClienteDao dao = new ClienteDao(this);
        clientes=dao.getList();
        dao.close();
        //declarando a lista de clientes
        //String[] clientes = {"Isabela", "Helena", "Miguel", "José Roberto", "Júlia", "Maria Amélia", "Sérgio"};

        // array contém string e o android só aceita objetos do tipo view dai a necessidade de um adaptador para que os dois possam "conversar"

        //int layout=android.R.layout.simple_list_item_1;
        ArrayAdapter<Mcliente> adapter =
                new ArrayAdapter<Mcliente>(this,
                        android.R.layout.simple_list_item_1,
                        clientes);

        listaClientes.setAdapter(adapter);

        listaClientes.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

            }

        });

        listaClientes.setOnItemLongClickListener(new AdapterView.OnItemLongClickListener() {
            @Override
            public boolean onItemLongClick(AdapterView<?> parent, View view, int position, long id) {

                clienteSelecionado = (Mcliente) parent.getItemAtPosition(position);

                Toast.makeText(MainActivity.this, "Mcliente : " + clienteSelecionado,Toast.LENGTH_LONG).show();



                //retorna falso para o evento voltar o click


                return false;
            }




        } );

        registerForContextMenu(listaClientes);





        // TIRA O NOME DA APLICAÇÃO
        /*requestWindowFeature(Window.FEATURE_NO_TITLE);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);*/

        //A APLICAÇÃO EXECUTA EM FULLSCREEN
        /*getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
                WindowManager.LayoutParams.FLAG_FULLSCREEN);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);*/
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

       //testando o clique no menu
        switch (item.getItemId()){
            case R.id.cadastro:
                Intent intente = new Intent(this, Formulario.class);
                startActivity(intente);
                return false;
            default:
                return super.onOptionsItemSelected(item);
        }
    }

    @Override

    //O método onResume () define o ciclo de vida de uma activity
        protected void onResume(){

        super.onResume();
        this.carregaLista();
    }

    private void carregaLista() {

        ClienteDao dao = new ClienteDao(this);
        List<Mcliente> clientes = dao.getList();
        dao.close();

        ArrayAdapter<Mcliente> adapter =
                new ArrayAdapter<Mcliente>(this,
                        android.R.layout.simple_list_item_1,
                        clientes);

        listaClientes.setAdapter(adapter);


    }
    @Override

    public void onCreateContextMenu(ContextMenu menu, View v, ContextMenu.ContextMenuInfo menuInfo){

        super.onCreateContextMenu(menu, v, menuInfo);
        menu.add("Excluir");
        menu.add("Alterar");
        menu.add("Mostrar");

        MenuItem deletar=menu.add("Deletar");
        deletar.setOnMenuItemClickListener(new MenuItem.OnMenuItemClickListener() {
            @Override
            public boolean onMenuItemClick(MenuItem item) {

                ClienteDao dao=new ClienteDao(MainActivity.this);

                dao.deleta(clienteSelecionado);
                dao.close();
                carregaLista();
                return false;
            }
        });

    }
}
