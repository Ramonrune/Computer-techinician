package br.senai.sp.myapplication;

import android.app.DatePickerDialog;
import android.app.Dialog;
import android.app.DialogFragment;
import android.app.Fragment;
import android.os.Bundle;

/**
 * Created by B30 on 18/03/2015.
 */
public class DatePickerDialogFragment  extends DialogFragment{
    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        Bundle args = getArguments();
        Fragment editFragment = getFragmentManager()
                .findFragmentByTag(
                          ReminderEditFragment.DEFAULT_EDIT_FRAGMENT_TAG);
        DatePickerDialog.OnDateSetListener listener = (DatePickerDialog.OnDateSetListener) editFragment;

        return new DatePickerDialog(getActivity(), listener,
                args.getInt(ReminderEditFragment.YEAR),
                args.getInt(ReminderEditFragment.MONTH),
                args.getInt(ReminderEditFragment.DAY));
    }
}
