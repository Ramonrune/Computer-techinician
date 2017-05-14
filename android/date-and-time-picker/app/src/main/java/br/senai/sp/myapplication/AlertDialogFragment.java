package br.senai.sp.myapplication;

import android.app.AlertDialog;
import android.app.Dialog;
import android.app.DialogFragment;
import android.app.FragmentTransaction;
import android.content.DialogInterface;
import android.os.Bundle;

/**
 * Created by B30 on 18/03/2015.
 */
public class AlertDialogFragment extends DialogFragment {
    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState){
        AlertDialog.Builder builder
        = new AlertDialog.Builder((getActivity()));
    builder.setMessage("Are you sure you want to save the task?")
            .setTitle("Are you sure?")
            .setCancelable(false)
            .setPositiveButton("Yes",
             new DialogInterface.OnClickListener(){
                public void onClick(DialogInterface dialog, int id){
                    //Execute alguma ação, tal como salvar o item
                }
             })
            .setNegativeButton("No", new DialogInterface.OnCancelListener() {
                public void onClick(DialogInterface dialog, int id) {
                        dialog.cancel();
        }
    });
    return builder.create();
    }

    FragmentTransaction ft = getFragmentManager().beginTransaction();
    DialogFragment newFragment = new AlertDialogFragment();
    newFragment.show(ft, "alertDialog");
}
