import React, {useState} from "react";
import { useFormik } from 'formik';


/**
 * @description Validate the email address
 * @param values
 * @returns {{}}
 */
const validate = (values) => {
    const errors = {}

    if (!values.email) {
        errors.email = 'Required'
    } else if (!/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(values.email)) {
        errors.email = 'Invalid email address'
    }

    return errors
}

const Main = () => {
    const  [inputValue, setInputValue] =  useState('');

    const  handleChange = (event) => {
        setInputValue(event.target.value);
    };

    /**
     * @description Init the email field value and handle the onSubmit on Success
     * @type {{initialValues: {email: string}, initialErrors: FormikErrors<unknown>, initialTouched: FormikTouched<unknown>, initialStatus: any, handleBlur: {(e: React.FocusEvent<any, Element>): void, <T=any>(fieldOrEvent: T): T extends string ? ((e: any) => void) : void}, handleChange: {(e: React.ChangeEvent<any>): void, <T_1=string | React.ChangeEvent<any>>(field: T_1): T_1 extends React.ChangeEvent<any> ? void : ((e: (string | React.ChangeEvent<any>)) => void)}, handleReset: (e: any) => void, handleSubmit: (e?: React.FormEvent<HTMLFormElement>) => void, resetForm: (nextState?: Partial<FormikState<{email: string}>>) => void, setErrors: (errors: FormikErrors<{email: string}>) => void, setFormikState: (stateOrCb: (FormikState<{email: string}> | ((state: FormikState<{email: string}>) => FormikState<{email: string}>))) => void, setFieldTouched: (field: string, touched?: boolean, shouldValidate?: boolean) => (Promise<FormikErrors<{email: string}>> | Promise<void>), setFieldValue: (field: string, value: any, shouldValidate?: boolean) => (Promise<FormikErrors<{email: string}>> | Promise<void>), setFieldError: (field: string, value: (string | undefined)) => void, setStatus: (status: any) => void, setSubmitting: (isSubmitting: boolean) => void, setTouched: (touched: FormikTouched<{email: string}>, shouldValidate?: boolean) => (Promise<FormikErrors<{email: string}>> | Promise<void>), setValues: (values: React.SetStateAction<{email: string}>, shouldValidate?: boolean) => (Promise<FormikErrors<{email: string}>> | Promise<void>), submitForm: () => Promise<any>, validateForm: (values?: {email: string}) => Promise<FormikErrors<{email: string}>>, validateField: (name: string) => (Promise<void> | Promise<string | undefined>), isValid: boolean, dirty: boolean, unregisterField: (name: string) => void, registerField: (name: string, {validate}: any) => void, getFieldProps: (nameOrOptions: (string | FieldConfig<any>)) => FieldInputProps<any>, getFieldMeta: (name: string) => FieldMetaProps<any>, getFieldHelpers: (name: string) => FieldHelperProps<any>, validateOnBlur: boolean, validateOnChange: boolean, validateOnMount: boolean, values: {email: string}, errors: FormikErrors<{email: string}>, touched: FormikTouched<{email: string}>, isSubmitting: boolean, isValidating: boolean, status?: any, submitCount: number}}
     */
    const formik = useFormik({
        initialValues: {
            email: '',
        },
        validate,
        onSubmit: (values) => {
            alert(JSON.stringify(values, null, 2))
        },
    })

    return (
        <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add a new email
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form onSubmit={formik.handleSubmit}>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a new user email</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <div>
                                <label htmlFor="email">Email</label>
                                <input type="email" name="email" id="email"
                                       onChange={formik.handleChange} onBlur={formik.handleBlur} value={formik.values.email}/>
                                {formik.touched.email && formik.errors.email && (
                                    <p class="text-danger">{formik.errors.email}</p>
                                )}
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    );
};

export default Main;
