package br.senai.sp.manipulacaodedata;

import android.app.Dialog;
import android.app.TimePickerDialog;
import android.app.TimePickerDialog.OnTimeSetListener;
import android.os.Bundle;


public class TimePickerDialogFragment {
    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        Bundle args = getArguments();
        OnTimeSetListener listener = (OnTimeSetListener) getFragmentManager()
                .findFragmentByTag(
                        ReminderEditFragment.DEFAULT_EDIT_FRAGMENT_TAG);
        return new TimePickerDialog(getActivity(), listener,
                args.getInt(ReminderEditFragment.HOUR),
                args.getInt(ReminderEditFragment.MINS), false);
    }
}