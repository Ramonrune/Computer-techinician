package br.senai.sp.myapplication;

import android.app.DatePickerDialog;
import android.app.Dialog;
import android.app.DialogFragment;
import android.app.Fragment;
import android.app.TimePickerDialog;
import android.os.Bundle;

/**
 * Created by B30 on 18/03/2015.
 */
public class TimePickerDialogFragment extends DialogFragment {
    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        Bundle args = getArguments();
       TimePickerDialog.OnTimeSetListener listener = (TimePickerDialog.OnTimeSetListener) getFragmentManager()
                .findFragmentByTag(
                        ReminderEditFragment.DEFAULT_EDIT_FRAGMENT_TAG);
        return new TimePickerDialog(getActivity(), listener,
                args.getInt(ReminderEditFragment.HOUR),
                args.getInt(ReminderEditFragment.MINS),false);       ;
    }
}
